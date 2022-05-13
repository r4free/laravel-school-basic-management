<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;

class RegisterSchoolTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_show_register_form()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
    
    public function test_user_can_register_school_and_login_after_create()
    {
        $data = [
            'name' => $this->faker->name,
            'school_name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 123123
        ];

        $response = $this->post('/register', $data);

        $response->assertStatus(302);
    }
    
    public function test_email_is_required_on_register()
    {
        $data = [
            'name' => $this->faker->name,
            'school_name' => $this->faker->name,
            'password' => 123123
        ];

        $response = $this->post('/register', $data);

        $response
        ->assertSessionHasErrors('email')
        ->assertStatus(302);
    }
    
    public function test_name_is_required_on_register()
    {
        $data = [
            'school_name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 123123
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors('name')
        ->assertStatus(302);
    }
    
    public function test_school_name_is_required_on_register()
    {
        $data = [
            'name' => $this->faker->email,
            'email' => $this->faker->email,
            'password' => 123123
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors('school_name')
        ->assertStatus(302);
    }
    
    public function test_password_is_required_on_register()
    {
        $data = [
            'school_name' => $this->faker->email,
            'name' => $this->faker->email,
            'email' => $this->faker->email,
        ];

        $response = $this->post('/register', $data);

        $response->assertSessionHasErrors('password')
        ->assertStatus(302);
    }
}
