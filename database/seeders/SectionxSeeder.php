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
        // Para home page
        Sectionx::create([
            'name' => 'Home - Section 1 - Main Image',
            'note' => 'key - mainImage',
            'note1' => 'Section 1',
            'note2' => '',
            'description' => 'Image size: 3840x1920px',
            'page_id' => 1,
            'status' => 'ACTIVE',
        ]);

        Sectionx::create([
            'name' => 'Home - Section 2 - Main Video',
            'note' => 'key - mainVideo',
            'note1' => 'Section 2',
            'note2' => '',
            'description' => 'Video size: 1920x1080px',
            'page_id' => 1,
            'status' => 'ACTIVE',
        ]);

        Sectionx::create([
            'name' => 'Home - Section 3 - Articles',
            'note' => 'keys - article1, article2, article3, article4',
            'note1' => 'Section 3',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 1,
            'description' => 'Image size: 1920x1280px',
        ]);

        Sectionx::create([
            'name' => 'Home - Section 4 - Type of Services',
            'note' => 'No key',
            'note1' => 'Section 4',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 1,
            'description' => '',
        ]);
        Sectionx::create([
            'name' => 'Home - Section 5 - Large Image A',
            'note' => 'key - largeImageA',
            'note1' => 'Section 5',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 1,
            'description' => 'Image size: 3840x1920px',
        ]);
        Sectionx::create([
            'name' => 'Home - Section 6 - Calendar',
            'note' => 'no key',
            'note1' => 'Section 6',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 1,
            'description' => 'Image size: 1920x1280px',
        ]);
        Sectionx::create([
            'name' => 'Home - Section 7 - Location',
            'note' => 'key - locationImage',
            'note1' => 'Section 7',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 1,
            'description' => 'Image size: 3840x1920px',
        ]);
        Sectionx::create([
            'name' => 'Home - Section 8 - Large Image B',
            'note' => 'key - largeImageB',
            'note1' => 'Section 8',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 1,
            'description' => 'Image size: 3840x1920px',
        ]);
        Sectionx::create([
            'name' => 'Home - Section 9 - Specials of the week',
            'note' => 'key - special1, special2, special3, special4...',
            'note1' => 'Section 9',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 1,
            'description' => 'Image size: 3840x1920px',
        ]);
        Sectionx::create([
            'name' => 'Home - Section 10 - Contact Info',
            'note' => 'no key',
            'note1' => 'Section 10',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 1,
            'description' => 'Image size: 3840x1920px',
        ]);

        // Para gallery
        Sectionx::create([
            'name' => 'Gallery',
            'note' => 'no key',
            'status' => 'ACTIVE',
            'page_id' => 2,
            'description' => 'Image size: 3840x1920px',
        ]);

        // Para testimonials
        Sectionx::create([
            'name' => 'Testimonials',
            'note' => 'keys - testimonial1, testimonial1, testimonial3, ...until testimonial10',
            'status' => 'ACTIVE',
            'page_id' => 3,
            'description' => 'Image size: 400x400px',

        ]);
        // About Page
        Sectionx::create([
            'name' => 'About',
            'note' => 'keys - aboutImg1, aboutImg2, aboutImg3, aboutImg4, aboutImg5',
            'note1' => 'Section 1',
            'note2' => ' Where Every Event Becomes a Memory',
            'status' => 'ACTIVE',
            'page_id' => 4,
            'description' => 'Emphasizes the idea that our venue is dedicated to creating unforgettable
             experiences for guests. Each occasion hosted at our venue is not just an event, but a significant
             moment in people’s lives that they will cherish and remember.',
        ]);
        Sectionx::create([
            'name' => 'About - Our Mission',
            'note' => '',
            'note1' => 'Section 2',
            'note2' => 'Our Mission',
            'status' => 'ACTIVE',
            'page_id' => 4,
            'description' => 'Mission Statement: At THE PALACE HALL, our mission is to create unforgettable
             experiences by providing a stunning and versatile space for every occasion. We are dedicated
             to exceptional service, fostering community connections, and transforming visions into reality.',
        ]);
        Sectionx::create([
            'name' => 'About - Lage Image A',
            'note' => 'key - aboutImageA',
            'note1' => 'Section 3',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 4,
            'description' => '',
        ]);
        Sectionx::create([
            'name' => 'About - Our values',
            'note' => 'keys - aboutImg1, aboutImg2, aboutImg3, aboutImg4, aboutImg5',
            'note1' => 'Section 4',
            'note2' => 'Our Value',
            'status' => 'ACTIVE',
            'page_id' => 4,
            'description' => '',
        ]);
        Sectionx::create([
            'name' => 'About - Section 5 - Logo Cloud',
            'note' => 'keys - ',
            'note1' => 'Section 5',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 4,
            'description' => '',
        ]);
        Sectionx::create([
            'name' => 'About - Section 6 - Team Members',
            'note' => 'keys - ',
            'note1' => 'Section 6',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 4,
            'description' => '',
        ]);
        Sectionx::create([
            'name' => 'About - Section 7 - Blog',
            'note' => 'keys - ',
            'note1' => 'Section 7',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 4,
            'description' => '',
        ]);
        Sectionx::create([
            'name' => 'About - Section 8 - Contact Info',
            'note' => 'keys - ',
            'note1' => 'Section 8',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 4,
            'description' => '',
        ]);

        // Photography Page
        Sectionx::create([
            'name' => 'Photography - Section 1 - Carrousel',
            'note' => 'no key',
            'note1' => 'Section 1',
            'status' => 'ACTIVE',
            'page_id' => 6,
            'description' => 'Image size: 3840x1920px',
        ]);
        Sectionx::create([
            'name' => 'Photography - Section 2 - Articles',
            'note' => 'Key code: art1p, art2p, art3p, art4p',
            'note1' => 'Section 2',
            'status' => 'ACTIVE',
            'page_id' => 6,
            'description' => 'Image size: 1920x1280px',
        ]);
        Sectionx::create([
            'name' => 'Photography - Section 3 - ParallaxImages1',
            'note' => 'key = parallaxImage1',
            'note1' => 'Section 3',
            'status' => 'ACTIVE',
            'page_id' => 6,
            'description' => 'Image size: 3840x1920px',
        ]);
        Sectionx::create([
            'name' => 'Photography - Section 4 - Blogs',
            'note' => 'Key code: blog1p, blog2p, blog3p',
            'note1' => 'Section 4',
            'status' => 'ACTIVE',
            'page_id' => 6,
            'description' => 'Image size: 1920x1280px',
        ]);
        Sectionx::create([
            'name' => 'Photography - Section 5 - Videos',
            'note' => 'Key code: blog1p, blog2p, blog3p',
            'note1' => 'Section 5',
            'status' => 'ACTIVE',
            'page_id' => 6,
            'description' => 'Video size',
        ]);
        Sectionx::create([
            'name' => 'Photography - Section 6 - ParallaxImages2',
            'note' => 'key = parallaxImage2',
            'note1' => 'Section 6',
            'status' => 'ACTIVE',
            'page_id' => 6,
            'description' => 'Image size: 3840x1920px',
        ]);
        Sectionx::create([
            'name' => 'Photography -  Section 7 - Contact Info',
            'note' => 'no key',
            'note1' => 'Section 7',
            'note2' => '',
            'status' => 'ACTIVE',
            'page_id' => 6,
            'description' => 'Image size: 3840x1920px',
        ]);
    }
}
