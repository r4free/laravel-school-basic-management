<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Group;
use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::get()->each(function($school){
            Grade::get()->each(function($grade) use($school){
                Group::factory()->count(5)
                ->create([
                    'school_id' => $school->id,
                    'grade_id' => $grade->id
                ]);
            });
        });
    }
}
