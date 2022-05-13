<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            [
                'name' => '1º ano',
            ],
            [
                'name' => '2º ano',
            ],
            [
                'name' => '3º ano',
            ],
            [
                'name' => 'Pré vestibular',
            ],
        ];

        foreach($grades as $grade){
            Grade::create($grade);
        }
    }
}
