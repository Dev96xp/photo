<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vendor::create([
            'name' => 'All Vendors',
            'code' => 'AL',
            'email' => 'all@gmail.com',
        ]);
        Vendor::create([
            'name' => 'Personal',
            'code' => 'PE',
            'email' => 'personal@gmail.com',
        ]);
        Vendor::create([
            'name' => 'Home Depot',
            'code' => 'HD',
            'email' => 'homedepot@gmail.com',
        ]);
        Vendor::create([
            'name' => 'Menards',
            'code' => 'ME',
            'email' => 'menards@gmail.com',
        ]);
    }
}
