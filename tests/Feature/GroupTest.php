<?php

namespace Tests\Feature;

use App\Models\Grade;
use App\Models\Group;
use App\Models\School;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    
    public function test_list_groups()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager)->get('admin/groups');
        $response->assertStatus(200);
    }
    
    public function test_user_can_create_a_group()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager)
        ->post(route('admin.groups.store'), [
            "name" => $this->faker->name,
            "shift" => ["manhã"][0],
            "grade_id" => Grade::first()->id,
        ]);
        $response->assertStatus(200);
    
    }
    
    public function test_a_user_can_see_edit_group_page()
    {
        $manager = $this->createUserManager(School::first());
        $response = $this->actingAs($manager);
        $group = Group::first();
        $response = $response->get(route('admin.groups.edit',  $group->id));
        $response->assertStatus(200)
        ->assertViewHas("group", $group);
    
    }

    public function test_a_user_can_see_update_group()
    {
        $manager = $this->createUserManager(School::first());
        $response = $this->actingAs($manager);
        $group = Group::first();
        $response = $response->put(route('admin.groups.update',  $group->id),[
            "shift" => $group->shift,
            "grade_id" => $group->grade_id,
            "name" => $group->name . " edited",
        ]);

        $response->assertRedirect(route('admin.groups.index'));
    
    }
    
    public function test_user_can_access_create_group_page()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager)
        ->get(route('admin.groups.create'));
        $response->assertStatus(200);
    }
}
