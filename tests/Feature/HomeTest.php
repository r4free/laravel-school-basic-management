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
        $school = School::factory()->create();
        $user_data = User::factory()->make()->toArray();
        $user_data['password'] = 123123;
        $user = $school->addManager($user_data);

        $response = $this->actingAs($user)->get(route('admin.home'));

        $response->assertStatus(200);
    }
}
