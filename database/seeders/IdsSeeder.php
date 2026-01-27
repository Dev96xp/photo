<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ids;

class IdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ids::create([
            'tables' => 'Users',
            'nextid' => 1000
        ]);
        Ids::create([
            'tables' => 'Products',
            'nextid' => 1000
        ]);
        Ids::create([
            'tables' => 'Tuxedos',
            'nextid' => 1000
        ]);
        Ids::create([
            'tables' => 'Accounts',
            'nextid' => 10000000
        ]);
        Ids::create([
            'tables' => 'Businesses',
            'nextid' => 10000000
        ]);
        Ids::create([
            'tables' => 'Colors',
            'nextid' => 1005
        ]);
        Ids::create([
            'tables' => 'Appointments',
            'nextid' => 1002
        ]);
        Ids::create([
            'tables' => 'Settings',
            'nextid' => 1004
        ]);
        // Ids::create([        SE CAMBIO A EVENTS
        //     'tables' => 'Sets',
        //     'nextid' => 1004
        // ]);

        Ids::create([
            'tables' => 'Events',
            'nextid' => 1004
        ]);

        Ids::create([
            'tables' => 'Projects',
            'nextid' => 1004
        ]);
    }
}
