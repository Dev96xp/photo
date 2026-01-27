<?php

namespace Database\Seeders;

use App\Models\Store;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Store::create([
            'name' => 'Omaha',
            'code' => 'omaha',
            'address' => '3001 S 144th St, Omaha, NE 68144',
            'city' => 'Omaha',
            'state' =>  'NE',
            'phone' => '402-884-9950',
            'zip' => '68144',
            'code_ip' => '127.1.1.1',
        ]);

        Store::create([
            'name' => 'Online',
            'code' => 'web',
            'address' => '315 West 3rd st, Grand Island, NE 68801',
            'city' => 'Conocido',
            'state' =>  'NE',
            'phone' => '402-884-9950',
            'zip' => '68110',
            'code_ip' => '127.1.1.1',
        ]);

        Store::create([
            'name' => 'Kansas',
            'code' => 'Kansas',
            'address' => '10000 California St Suite 1221, Omaha, NE 68114',
            'city' => 'Kansas',
            'state' =>  'MO',
            'phone' => '402-884-9950',
            'zip' => '68144',
            'code_ip' => '127.1.1.1',

        ]);


        Store::create([
            'name' => 'Southerhills',
            'code' => 'southerhills',
            'address' => '4400 Sergeant Rd Ste 317, Sioux City, IA 51106',
            'city' => 'Sioux City',
            'state' =>  'IA',
            'phone' => '402-884-9950',
            'zip' => '68144',
            'code_ip' => '127.1.1.1',
        ]);

        Store::create([
            'name' => 'Grand Island',
            'code' => 'downtown',
            'address' => '315 West 3rd st, Grand Island, NE 68801',
            'city' => 'Grand Island',
            'state' =>  'NE',
            'phone' => '402-884-9950',
            'zip' => '68144',
            'code_ip' => '127.1.1.1',
        ]);

        Store::create([
            'name' => 'Miami',
            'code' => 'coralgables',
            'address' => 'Conocido, Coral Gables, Florida 68801',
            'city' => 'Coral Gables',
            'state' =>  'FL',
            'phone' => '402-884-9950',
            'zip' => '68144',
            'code_ip' => '127.1.1.1',
        ]);
    }
}
