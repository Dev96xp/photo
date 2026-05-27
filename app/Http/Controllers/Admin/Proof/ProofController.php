<?php

namespace App\Http\Controllers\Admin\Proof;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Intervention\Image\Laravel\Facades\Image;
use Intervention\Image\ImageManager;

use Intervention\Image\Drivers\Gd\Driver;
//use Intervention\Image\Drivers\Imagick\Driver;

class ProofController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.proof.index');
    }

    public function save_images(Request $request, Gallery $gallery)
    {
        // ya funciona

        /*
            ****  METODO 1 NORMAL
            $request->validate([
                'file' => 'required|image|max:2045'  //Esto determina que tamaño de imagen se permite subir
            ]);

            $imagenes = $request->file('file')->store('public/images/sections');
            // Aqui se cambia la direcion public por storage usando este facade (Illuminate\Support\Facades\Storage)
            $url = Storage::url($imagenes);     // Como esto ('storage/images/sections')

            // Guardo esta url en la tabla (file)
            File::create([
                'url'=>$url,
            ]); */

        // Regreso a la vista index
        //return redirect()->route('admin.sections.index');



        // ***  METODO 2 USANDO INTERVENSION VERSION 3

        // 1#. Validacion de la imagen
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif,webp|max:10240'
        ]);

        // 2#. Se genera la ruta completa con nombre del archivo
        $extension = $request->file('file')->extension(); // Usa MIME type real, no el nombre del cliente
        $nombre = Str::random(20) . '.' . $extension;
        $ruta = storage_path() . '/app/public/galleries/' . $nombre;   //Ruta completa con nombre
        // Solo checar - $ruta = storage_path() . '/app/public/products/' . $nombre;   //  Nueva ruta donde se gusradra el archivo

        // 3#. Se modifica el tamaño del archivo y se guarda en la ruta apropiada
        /* ********USO INTERVENSION Version 3  (https:.intervention.io)
                https://image.intervention.io/v3/introduction/installation
                para cambiar su dimencion de altura conservando su proporcion,
                para luego guardala en la ruta contenida*/

        Image::read($request->file('file'))     //Lee el archivo
            ->scale(height: 1200)               //Cambia su altura a 1200px y conserva proporcion
            ->save($ruta);                      //Guarda la imagen en la ruta establecida, en tus carpestas

        // Guardo esta url en la tabla (file) YA NO SE VA A USAR
        // File::create([
        //     'user_id' => auth()->user()->id,
        //     'url' => '/storage/images/sections/' . $nombre,
        // ]);

        // 4#. Crea nuevo registro y guarda la cada nueva url en la tabla (images)
        $gallery->images()->create([
            'url' => 'galleries/' . $nombre
        ]);


        //return redirect()->route('admin.sections.index')->with('info', 'Las fotos se agregaron corectamente !!!');
    }

    // Subir imagenes usando Dropzone
    public function upload_images(Gallery $gallery)
    {
        return view('admin.proof.upload_images_dropzone', compact('gallery'));
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
