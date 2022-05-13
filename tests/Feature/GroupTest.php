<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GroupTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_list_groups()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager)->get('admin/groups');
        $response->assertStatus(200);
    }
}
