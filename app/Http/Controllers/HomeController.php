<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $month_number = 7;
        $currentDate = now();
        $currentYear = date("Y");
        $currentMonth = date("F");
        $firstDayOfMonth = Carbon::getWeekStartsAt(); //Obtiene el primer dia del mes que puede ser de [1(lunes)-7()domindo]
        $daysInMonth = Carbon::now()->month($month_number)->daysInMonth;  // El numero de dias que contiene un mes
        $firstDayOfMonth = 1;

        $business = Business::first();  //Todos los datos referente a este website

        // $pages = Page::where('name','Home')
        // ->where('status', 'Active')
        // ->get();

        $pages = Page::find(1);

        $sectionxes = $pages->sectionxes;

        $mainImage = '';
        $logo1 = '';
        $logo2 = '';
        $logo3 = '';

        $largeImageA = '';
        $largeImageA_name = '';
        $largeImageA_note = '';
        $largeImageA_desc = '';

        $largeImageB = '';
        $largeImageB_name = '';
        $largeImageB_note = '';
        $largeImageB_desc = '';

        $locationImage = '';


        $section3_note2 = '';
        $section4_note2 = '';
        $section4_desc = '';


        $name_article1 = '';
        $name_article2 = '';
        $name_article3 = '';
        $name_article4 = '';
        $article1 = '';
        $description_article1 = '';
        $article2 = '';
        $description_article2 = '';
        $article3 = '';
        $description_article3 = '';
        $article4 = '';
        $description_article4 = '';

        $name_special1 = '';
        $name_special2 = '';
        $name_special3 = '';
        $name_special4 = '';
        $special1 = '';
        $special2 = '';
        $special3 = '';
        $special4 = '';
        $description_special1 = '';
        $description_special2 = '';
        $description_special3 = '';
        $description_special4 = '';

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
                    $section3_note2 = $section->note2;
                    break;
                case 'Section 4':
                    $active4 = $section->status;
                    $section4_note2 = $section->note2;
                    $section4_desc = $section->description;
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
                    case 'mainImage':
                        $mainImage = $image->url;
                        break;
                    case 'article1':
                        $name_article1 = $image->name;
                        $article1 = $image->url;
                        $description_article1 = $image->description;
                        break;
                    case 'article2':
                        $name_article2 = $image->name;
                        $article2 = $image->url;
                        $description_article2 = $image->description;
                        break;
                    case 'article3':
                        $name_article3 = $image->name;
                        $article3 = $image->url;
                        $description_article3 = $image->description;
                        break;
                    case 'article4':
                        $name_article4 = $image->name;
                        $article4 = $image->url;
                        $description_article4 = $image->description;
                        break;
                    case 'locationImage':
                        $locationImage = $image->url;
                        break;
                    case 'largeImageA':
                        $largeImageA = $image->url;
                        $largeImageA_name = $image->name;
                        $largeImageA_note = $image->note;
                        $largeImageA_desc = $image->description;
                        break;
                    case 'largeImageB':
                        $largeImageB = $image->url;
                        $largeImageB_name = $image->name;
                        $largeImageB_note = $image->note;
                        $largeImageB_desc = $image->description;
                        break;
                    case 'special1':
                        $name_special1 = $image->name;
                        $special1 = $image->url;
                        $description_special1 = $image->description;
                        break;
                    case 'special2':
                        $name_special2 = $image->name;
                        $special2 = $image->url;
                        $description_special2 = $image->description;
                        break;
                    case 'special3':
                        $name_special3 = $image->name;
                        $special3 = $image->url;
                        $description_special3 = $image->description;
                        break;
                    case 'special4':
                        $name_special4 = $image->name;
                        $special4 = $image->url;
                        $description_special4 = $image->description;
                        break;

                    default:
                        # code...
                        break;
                }
            }
        }


        return view('welcome', compact(
            'logo1',
            'logo2',
            'logo3',
            'mainImage',
            'largeImageA',
            'largeImageA_name',
            'largeImageA_note',
            'largeImageA_desc',
            'largeImageB',
            'largeImageB_name',
            'largeImageB_note',
            'largeImageB_desc',
            'locationImage',
            'name_article1',
            'name_article2',
            'name_article3',
            'name_article4',
            'article1',
            'article2',
            'article3',
            'article4',
            'description_article1',
            'description_article2',
            'description_article3',
            'description_article4',
            'currentDate',
            'currentYear',
            'currentMonth',
            'firstDayOfMonth',
            'daysInMonth',
            'business',
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
            'special1',
            'special2',
            'special3',
            'special4',
            'description_special1',
            'description_special2',
            'description_special3',
            'description_special4',
            'name_special1',
            'name_special2',
            'name_special3',
            'name_special4',

            // datos de las secciones
            'section3_note2',
            'section4_note2',
            'section4_desc'

        ));
    }
}
