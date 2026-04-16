<?php

use App\Http\Controllers\Photography\PhotographyController;
use Illuminate\Support\Facades\Route;


//########## My Images Dropdown ##############
// PRIVADA PARA LA GENTE AUTENTIFICADA
Route::get('my-images', [PhotographyController::class, 'index'])->name('my-images');  // *** PUBLICO ***//
Route::get('my-images-2', [PhotographyController::class, 'index2'])->name('my-images-2');
Route::get('my-gallery/{gallery}', [PhotographyController::class, 'gallery'])->name('my-gallery');
