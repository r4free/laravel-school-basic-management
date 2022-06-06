<?php

namespace Tests;

use App\Models\School;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createUserManager(School $school = null) : User
    {
        $school = $school ? $school : School::factory()->create();
        $user_data = User::factory()->make()->toArray();
        $user_data['password'] = 123123;
        $user = $school->addManager($user_data);
        return $user;
    }

    public function setUp() : void
    {
        parent::setUp();
        $this->seed();
    }
}
