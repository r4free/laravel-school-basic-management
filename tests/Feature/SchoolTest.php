<?php

namespace Tests\Feature;

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
    
}
