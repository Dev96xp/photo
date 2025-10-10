<?php

namespace App\Http\Controllers\Pages\Testimonial;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testi_name1 = '';
        $testi_name2 = '';
        $testi_name3 = '';
        $testi_name4 = '';
        $testi_name5 = '';
        $testi_name6 = '';
        $testi_name7 = '';
        $testi_name8 = '';
        $testi_name9 = '';
        $testi_name10 = '';

        $testimonial1 = '';
        $testimonial2 = '';
        $testimonial3 = '';
        $testimonial4 = '';
        $testimonial5 = '';
        $testimonial6 = '';
        $testimonial7 = '';
        $testimonial8 = '';
        $testimonial9 = '';
        $testimonial10 = '';

        $testi_image1 = '';
        $testi_image2 = '';
        $testi_image3 = '';
        $testi_image4 = '';
        $testi_image5 = '';
        $testi_image6 = '';
        $testi_image7 = '';
        $testi_image8 = '';
        $testi_image9 = '';
        $testi_image10 = '';

        $testi_note1 = '';
        $testi_note2 = '';
        $testi_note3 = '';
        $testi_note4 = '';
        $testi_note5 = '';
        $testi_note6 = '';
        $testi_note7 = '';
        $testi_note8 = '';
        $testi_note9 = '';
        $testi_note10 = '';

        $pages = Page::find(3);     // Por defult #3 es para solo para testimonials

        $sectionxes = $pages->sectionxes;

        foreach ($sectionxes as $section) {
            foreach ($section->images as $image) {
                switch ($image->location) {
                    case 'testimonial1':
                        $testi_name1 = $image->name;               // agregar este campo ala tabla
                        $testimonial1 = $image->description;
                        $testi_image1 = $image->url;
                        $testi_note1 = $image->note1;
                        break;
                    case 'testimonial2':
                        $testi_name2 = $image->name;
                        $testimonial2 = $image->description;
                        $testi_image2 = $image->url;
                        $testi_note2 = $image->note1;
                        break;
                    case 'testimonial3':
                        $testi_name3 = $image->name;
                        $testimonial3 = $image->description;
                        $testi_image3 = $image->url;
                        $testi_note3 = $image->note1;
                        break;
                    case 'testimonial4':
                        $testi_name4 = $image->name;
                        $testimonial4 = $image->description;
                        $testi_image4 = $image->url;
                        $testi_note4 = $image->note1;
                        break;
                    case 'testimonial5':
                        $testi_name5 = $image->name;
                        $testimonial5 = $image->description;
                        $testi_image5 = $image->url;
                        $testi_note5 = $image->note1;
                        break;
                    case 'testimonial6':
                        $testi_name6 = $image->name;
                        $testimonial6 = $image->description;
                        $testi_image6 = $image->url;
                        $testi_note6 = $image->note1;
                        break;
                    case 'testimonial7':
                        $testi_name7 = $image->name;
                        $testimonial7 = $image->description;
                        $testi_image7 = $image->url;
                        $testi_note7 = $image->note1;
                        break;
                    case 'testimonial8':
                        $testi_name8 = $image->name;
                        $testimonial8 = $image->description;
                        $testi_image8 = $image->url;
                        $testi_note8 = $image->note1;
                        break;
                    case 'testimonial9':
                        $testi_name9 = $image->name;
                        $testimonial9 = $image->description;
                        $testi_image9 = $image->url;
                        $testi_note9 = $image->note1;
                        break;
                    case 'testimonial10':
                        $testi_name10 = $image->name;
                        $testimonial0 = $image->description;
                        $testi_image10 = $image->url;
                        $testi_note10 = $image->note1;
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }

        return view('pages.testimonials.index', compact('sectionxes'
        , 'testimonial1', 'testimonial2', 'testimonial3', 'testimonial4', 'testimonial5',
        'testimonial6', 'testimonial7', 'testimonial8', 'testimonial9', 'testimonial10',
    'testi_name1', 'testi_name2', 'testi_name3', 'testi_name4', 'testi_name5',
    'testi_name6', 'testi_name7', 'testi_name8', 'testi_name9', 'testi_name10',

    'testi_image1', 'testi_image2', 'testi_image3', 'testi_image4', 'testi_image5',
    'testi_image6', 'testi_image7', 'testi_image8', 'testi_image9', 'testi_image10',
    'testi_note1', 'testi_note2', 'testi_note3', 'testi_note4', 'testi_note5',
    'testi_note6', 'testi_note7', 'testi_note8', 'testi_note9', 'testi_note10'
    ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
