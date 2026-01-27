<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Project::create([
            'name' => 'All Projects',
            'code' => 'P0000-0000',
            'email' => 'nada@gmail.com',
            'status' => 'ACTIVE',
        ]);

        Project::create([
            'name' => 'Personal Projects',
            'code' => 'P0000-0001',
            'email' => 'personal@gmail.com',
            'status' => 'ACTIVE',
        ]);

        Project::factory(10)->create();
    }
}
