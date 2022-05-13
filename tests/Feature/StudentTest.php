<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_students()
    {
        $manager = $this->createUserManager();
        $response = $this->actingAs($manager)->get('admin/students');

        $response->assertStatus(200);
    }
}
