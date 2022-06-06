<?php

namespace Tests\Feature;

use App\Models\Grade;
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
    
    public function test_user_can_access_create_group_page()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager)
        ->get(route('admin.groups.create'));
        $response->assertStatus(200);
    }
}
