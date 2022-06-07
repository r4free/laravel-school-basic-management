<?php

namespace Tests\Feature;

use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SchoolTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    public function test_list_schools_to_super_admin()
    {
        $superadmin = $this->createSuperAdmin();
        $response = $this->actingAs($superadmin)->get(route('admin.schools.index'));
        $response->assertStatus(200)
        ->assertViewHas('schools');
    }

    public function test_a_user_can_see_edit_school_page()
    {
        $superadmin = $this->createSuperAdmin();
        $response = $this->actingAs($superadmin);
        $school = School::first();
        $response = $response->get(route('admin.schools.edit',  $school->id));
        $response->assertStatus(200)
        ->assertViewHas("school", $school);
    
    }


    public function test_a_superadmin_can_update_school()
    {
        $superadmin = $this->createSuperAdmin();
        $response = $this->actingAs($superadmin);
        $school = School::first();
        $response = $response->put(route('admin.schools.update',  $school->id),[
            "name" => $school->name . " edited",
        ]);

        $response->assertRedirect(route('admin.schools.index'));
    
    }

    public function test_user_can_access_create_school_page()
    {
        $superadmin = $this->createSuperAdmin();
        $response = $this->actingAs($superadmin)
        ->get(route('admin.schools.create'));
        $response->assertStatus(200)
        ->assertViewIs('pages.school.create');
    }
    
    public function test_superadmin_can_create_school()
    {
        $superadmin = $this->createSuperAdmin();
        $response = $this->actingAs($superadmin)
        ->post(route('admin.schools.store'),[
            "name" => $this->faker->name,
            "address" => $this->faker->address
        ]);
        $response->assertRedirect();
    }

    public function test_a_non_superadmin_cant_see_school_list()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager)->get(route('admin.schools.index'));
        $response->assertForbidden();
    }
    

    public function test_a_manager_cant_edit_others_schools()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager);
        $school = School::factory()->create();
        $response = $response->get(route('admin.schools.edit',  $school->id));
        $response->assertNotFound();
    }
    
    public function test_a_manager_cant_update_others_schools()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager);
        $school = School::factory()->create();
        $response = $response->put(route('admin.schools.update',  $school->id),[
            "name" => $this->faker->name,
            "address" => $school->address,
        ]);
        $response->assertNotFound();
    }
    
    
}
