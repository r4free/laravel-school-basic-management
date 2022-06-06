<?php

namespace Tests\Feature;

use App\Models\Group;
use App\Models\School;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_students()
    {
        $manager = $this->createUserManager(School::first());
        $response = $this->actingAs($manager)->get('admin/students');
        $response->assertStatus(200)
        ->assertViewHas('students');
    }



    public function test_user_can_see_create_a_student_page()
    {
        $manager = $this->createUserManager(School::first());
        $response = $this->actingAs($manager)
        ->get(route('admin.students.create'));
        $response->assertStatus(200)
        ->assertViewHas("groups", Group::all());
    
    }
   
    public function test_user_can_create_a_student()
    {
        $manager = $this->createUserManager(School::first());
        $response = $this->actingAs($manager)
        ->post(route('admin.students.store'), [
            "name" => $this->faker->name,
            "email" => $this->faker->email,
            "group_id" => Group::first()->id,
        ]);
        $response
        ->assertRedirect(route('admin.students.index'));
    
    }

    public function test_a_user_can_see_edit_student_page()
    {
        $manager = $this->createUserManager(School::first());
        $response = $this->actingAs($manager);
        $student = Student::first();
        $groups = Group::all();
        $response = $response->get(route('admin.students.edit',  $student->id));
        $response->assertStatus(200)
        ->assertViewHas([
            "student" => $student,
            "groups" => $groups
        ]);
    
    }

    public function test_a_user_can_see_update_student()
    {
        $manager = $this->createUserManager(School::first());
        $response = $this->actingAs($manager);
        $student = Student::first();

        $response = $response->put(route('admin.students.update',  $student->id),[
            "name" => $student->name,
            "email" => $student->email,
            "group_id" => $student->group_id,
        ]);

        $response->assertRedirect(route('admin.students.index'));
    
    }
}

