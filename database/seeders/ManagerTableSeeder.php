<?php

namespace Database\Seeders;

use App\Models\Manager;
use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ManagerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::get()->each(function($school){
            Manager::factory()->count(10)
            ->create([
                'school_id' => $school->id
            ]);
        });
    }
}
