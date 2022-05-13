<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_logout()
    {
        $manager = User::where('role_id', 2)->first();

        $response = $this->actingAs($manager)->get(route('admin.logout'));

        $response->assertStatus(302);
    }
}
