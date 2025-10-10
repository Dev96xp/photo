<?php

namespace App\Http\Controllers\Pages\Photography;

use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Page;
use Illuminate\Http\Request;

class PhotographyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $business = Business::first();  //Todos los datos referente a este website
        // Es un helper, que obtiene y registra un nuevo ip address(visitante nr)
        get_ip_address($request);
        $pages = Page::find(6);     // Por defult #6 es para la pagina photography
        $sectionxes = $pages->sectionxes;   // Por defult un apagina incluye varias sectiones
        // Se obtiene la PRIMERA section solamente para usarla en el carousel principal
        $galleryOfCarouselPrincipal = $sectionxes->first()->images;       // imagenes para el carrousel principal

        $logo1 = '';
        $logo2 = '';
        $logo3 = '';

        $art1p = '';
        $art2p = '';
        $art3p = '';
        $art4p = '';

        $art1p_desc = '';
        $art2p_desc = '';
        $art3p_desc = '';
        $art4p_desc = '';

        $art1p_name = '';
        $art2p_name = '';
        $art3p_name = '';
        $art4p_name = '';

        $blog1p = '';
        $blog2p = '';
        $blog3p = '';
        $blog4p = '';
        $blog1p_desc = '';
        $blog2p_desc = '';
        $blog3p_desc = '';
        $blog4p_desc = '';
        $blog1p_name = '';
        $blog2p_name = '';
        $blog3p_name = '';
        $blog4p_name = '';

        $parallaxImage1 = '';
        $parallaxImage1_name = '';
        $parallaxImage1_desc = '';
        $parallaxImage2 = '';
        $parallaxImage2_name = '';
        $parallaxImage2_desc = '';


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
                    break;
                case 'Section 2':
                    $active2 = $section->status;
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
                    case 'logo1':
                        $logo1 = $image->url;
                        break;
                    case 'logo2':
                        $logo2 = $image->url;
                        break;
                    case 'logo3':
                        $logo3 = $image->url;
                        break;
                    case 'art1p':
                        $art1p = $image->url;
                        $art1p_desc = $image->description;
                        $art1p_name = $image->name;
                        break;
                    case 'art2p':
                        $art2p = $image->url;
                        $art2p_desc = $image->description;
                        $art2p_name = $image->name;
                        break;
                    case 'art3p':
                        $art3p = $image->url;
                        $art3p_desc = $image->description;
                        $art3p_name = $image->name;
                        break;
                    case 'art4p':
                        $art4p = $image->url;
                        $art4p_desc = $image->description;
                        $art4p_name = $image->name;
                        break;
                    case 'blog1p':
                        $blog1p = $image->url;
                        $blog1p_name = $image->name;
                        $blog1p_desc = $image->description;
                        break;
                    case 'blog2p':
                        $blog2p = $image->url;
                        $blog2p_desc = $image->description;
                        $blog2p_name = $image->name;
                        break;
                    case 'blog3p':
                        $blog3p = $image->url;
                        $blog3p_desc = $image->description;
                        $blog3p_name = $image->name;
                        break;
                    case 'blog4p':
                        $blog4p = $image->url;
                        $blog4p_desc = $image->description;
                        $blog4p_name = $image->name;
                        break;
                    case 'parallaxImage1':
                        $parallaxImage1 = $image->url;
                        $parallaxImage1_desc = $image->description;
                        $parallaxImage1_name = $image->name;
                        break;
                    case 'parallaxImage2':
                        $parallaxImage2 = $image->url;
                        $parallaxImage2_desc = $image->description;
                        $parallaxImage2_name = $image->name;
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }


        return view('pages.photography.index', compact(
            'logo1',
            'logo2',
            'logo3',
            'business',
            'galleryOfCarouselPrincipal',
            'sectionxes',
            'art1p',
            'art2p',
            'art3p',
            'art4p',
            'art1p_desc',
            'art2p_desc',
            'art3p_desc',
            'art4p_desc',
            'art1p_name',
            'art2p_name',
            'art3p_name',
            'art4p_name',
            'blog1p',
            'blog2p',
            'blog3p',
            'blog4p',
            'blog1p_desc',
            'blog2p_desc',
            'blog3p_desc',
            'blog4p_desc',
            'blog1p_name',
            'blog2p_name',
            'blog3p_name',
            'blog4p_name',
            'parallaxImage1',
            'parallaxImage2',
            'parallaxImage1_name',
            'parallaxImage2_name',
            'parallaxImage1_desc',
            'parallaxImage2_desc',

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
