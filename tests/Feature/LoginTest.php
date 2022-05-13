<?php

namespace Tests\Feature;

use App\Models\Manager;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    
    public function test_login_page()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login()
    {

        $manager =  Manager::first();
        
        $response = $this->post(route('login'),[
            'email' => $manager->email,
            'password' => 'password'
        ]);

        $response->assertRedirect();

    }
}
