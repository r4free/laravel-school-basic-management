<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'id' => 1,
                'name' => 'Aluno',
            ],
            [
                'id' => 2,
                "name" => 'gestor'
            ],
            [
                "id" => 3,
                "name" => 'Superadmin'
            ]
        ];

        foreach($roles as $role){
            Role::create($role);
        }
        
    }
}
