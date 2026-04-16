<?php

namespace App\Http\Controllers\Admin\Session;

use App\Http\Controllers\Controller;
use App\Models\PhotoSession;
use App\Models\SessionGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class SessionGalleryController extends Controller
{
    public function index(PhotoSession $session)
    {
        return view('admin.session.galleries', compact('session'));
    }

    public function upload(PhotoSession $session, SessionGallery $gallery)
    {
        return view('admin.session.upload', compact('session', 'gallery'));
    }

    public function save_images(Request $request, PhotoSession $session, SessionGallery $gallery)
    {
        $request->validate(['file' => 'required|image']);

        $nombre = Str::random(10) . $request->file('file')->getClientOriginalName();
        $ruta   = storage_path() . '/app/public/galleries/' . $nombre;

        Image::read($request->file('file'))
            ->scale(height: 1200)
            ->save($ruta);

        $gallery->images()->create([
            'url'  => 'galleries/' . $nombre,
            'name' => pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME),
        ]);
    }
}
