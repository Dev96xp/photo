<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Page::create([
            'name' => 'Home',
            'description' => 'Page 1 - Home',
            'route' => '/',
            'active' => 'home',
            'status' => 'ACTIVE',

        ]);
        Page::create([
            'name' => 'Gallery',
            'description' => 'Page 2 - Gallery',
            'route' => 'gallery',
            'active' => 'gallery',
            'status' => 'ACTIVE',
        ]);
        Page::create([
            'name' => 'Testimonials',
            'description' => 'Page 3 - Testimonials',
            'route' => 'testimonial',
            'active' => 'testimonial',
            'status' => 'ACTIVE',
        ]);
        Page::create([
            'name' => 'About',
            'description' => 'Page 4 - About',
            'route' => 'about',
            'active' => 'about',
            'status' => 'ACTIVE',
        ]);
        Page::create([
            'name' => 'Store',
            'description' => 'Page 5 - Store',
            'route' => 'store',
            'active' => 'store',
            'status' => 'ACTIVE',
        ]);

        Page::create([
            'name' => 'Photography',
            'description' => 'Page 6 - Photography',
            'route' => 'photography',
            'active' => 'photography',
            'status' => 'ACTIVE',
        ]);
    }
}
