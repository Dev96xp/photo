<?php

namespace App\Http\Controllers\Pages\About;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pages = Page::find(4);     // Por defult #4 es para solo para "about page"
        $sectionxes = $pages->sectionxes;

        $aboutImg1 = '';
        $aboutImg2 = '';
        $aboutImg3 = '';
        $aboutImg4 = '';
        $aboutImg5 = '';
        $aboutImg6 = '';
        $aboutImg7 = '';
        $aboutImg8 = '';
        $aboutImg9 = '';
        $aboutImg10 = '';
        $aboutImageA = '';

        $about1_note = '';
        $about1_desc = '';

        $about2_note = '';
        $about2_desc = '';

        $active1 = 'INACTIVE';
        $active2 = 'INACTIVE';
        $active3 = 'INACTIVE';
        $active4 = 'INACTIVE';
        $active5 = 'INACTIVE';
        $active6 = 'INACTIVE';
        $active7 = 'INACTIVE';
        $active8 = 'INACTIVE';
        $active9 = 'INACTIVE';
        $active10 = 'INACTIVE';

        foreach ($sectionxes as $section) {
            switch ($section->note1) {
                case 'Section 1':
                    $active1 = $section->status;
                    $about1_note = $section->note2;
                    $about1_desc = $section->description;
                    break;
                case 'Section 2':
                    $active2 = $section->status;
                    $about2_note = $section->note2;
                    $about2_desc = $section->description;
                    break;
                case 'Section 3':
                    $active3 = $section->status;
                    break;
                case 'Section 4':
                    $active4 = $section->status;
                    break;
                case 'Section 5':
                    $active5 = $section->status;
                    break;
                case 'Section 6':
                    $active6 = $section->status;
                    break;
                case 'Section 7':
                    $active7 = $section->status;
                    break;
                case 'Section 8':
                    $active8 = $section->status;
                    break;
                case 'Section 9':
                    $active9 = $section->status;
                    break;
                case 'Section 10':
                    $active10 = $section->status;
                    break;

                default:
                    # code...
                    break;
            }
        }

        foreach ($sectionxes as $section) {
            foreach ($section->images as $image) {
                switch ($image->location) {
                    case 'aboutImg1':
                        $aboutImg1 = $image->url;
                        break;
                    case 'aboutImg2':
                        $aboutImg2 = $image->url;
                        break;
                    case 'aboutImg3':
                        $aboutImg3 = $image->url;
                        break;
                    case 'aboutImg4':
                        $aboutImg4 = $image->url;
                        break;
                    case 'aboutImg5':
                        $aboutImg5 = $image->url;
                        break;
                    case 'aboutImg6':
                        $aboutImg6 = $image->url;
                        break;
                    case 'aboutImg7':
                        $aboutImg7 = $image->url;
                        break;
                    case 'aboutImg8':
                        $aboutImg8 = $image->url;
                        break;
                    case 'aboutImg9':
                        $aboutImg9 = $image->url;
                        break;
                    case 'aboutImg10':
                        $aboutImg10 = $image->url;
                        break;
                    case 'aboutImageA':
                        $aboutImageA = $image->url;
                        break;

                    default:
                        # code...
                        break;
                }
            }
        }

        return view('pages.about.index', compact(
            'sectionxes',
            'aboutImg1',
            'about1_note',
            'about1_desc',
            'aboutImg2',
            'about2_note',
            'about2_desc',
            'aboutImg3',
            'aboutImg4',
            'aboutImg5',
            'aboutImg6',
            'aboutImg7',
            'aboutImg8',
            'aboutImg9',
            'aboutImg10',
            'aboutImageA',
            'active1',
            'active2',
            'active3',
            'active4',
            'active5',
            'active6',
            'active7',
            'active8',
            'active9',
            'active10',
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
