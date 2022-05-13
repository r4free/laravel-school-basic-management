<?php

namespace Tests\Feature;

use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use WithFaker,RefreshDatabase;
   
    public function test_acceses_logged_user_home_page()
    {
        $manager = $this->createUserManager();
        
        $response = $this->actingAs($manager)->get(route('admin.home'));

        $response->assertStatus(200);
    }
}
