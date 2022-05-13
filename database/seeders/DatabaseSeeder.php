<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            SchoolsTableSeeder::class,
            StudentsTableSeeder::class,
            ManagerTableSeeder::class,
            GradesTableSeeder::class,
            GroupsTableSeeder::class,
        ]);
    }
}
