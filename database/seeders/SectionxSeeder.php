<?php

namespace Database\Seeders;

use App\Models\Sectionx;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sectionx::create([
            'name' => 'Head Image',
            'status' => 'ACTIVE',
            'note' => 'key - headImage',
            'page_id' => 1,
            'description' => '3840 x 1920px',
        ]);
        Sectionx::create([
            'name' => 'At your service',
            'note' => 'keys - article1, article2, article3, article4',
            'status' => 'ACTIVE',
            'page_id' => 1,
        ]);
        Sectionx::create([
            'name' => 'Where are work',
            'note' => 'key - whereIWork',
            'status' => 'ACTIVE',
            'page_id' => 1,
        ]);
        Sectionx::create([
            'name' => 'Seccion X - Big foot image',
            'note' => 'key - footImage1',
            'status' => 'ACTIVE',
            'page_id' => 1,
        ]);
        Sectionx::create([
            'name' => 'Gallery',
            'note' => 'no key',
            'status' => 'ACTIVE',
            'page_id' => 2,
        ]);
        Sectionx::create([
            'name' => 'Testimonials',
            'status' => 'ACTIVE',
            'page_id' => 3,
        ]);
        Sectionx::create([
            'name' => 'About',
            'status' => 'ACTIVE',
            'page_id' => 4,
        ]);


        Sectionx::create([
            'name' => 'Photography',
            'note' => 'no key',
            'status' => 'ACTIVE',
            'page_id' => 6,
        ]);
        Sectionx::create([
            'name' => 'Heading',
            'note' => 'Key code: heading1, heading2, heading3, heading4',
            'status' => 'ACTIVE',
            'page_id' => 6,
        ]);
        Sectionx::create([
            'name' => 'Blogs',
            'note' => 'Key code: blog1, blog2, blog3',
            'status' => 'ACTIVE',
            'page_id' => 6,
        ]);
        Sectionx::create([
            'name' => 'Parallax Images',
            'note' => 'key = parallaxImage1, parallaxImage2',
            'status' => 'ACTIVE',
            'page_id' => 6,
        ]);

    }
}
