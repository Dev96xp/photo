<?php

namespace App\Livewire\Admin\Page;

use App\Models\Image;
use Livewire\Component;

class EditImage extends Component
{

    //#[Reactive]
    public $image_id;    // ($event_id, es el evento selecionado, esta variable viene
                         // desde el componente[EventsIndex] y esta sincronizada)

    public $open = false;
    public $image, $type = 5;

    public $imageEditId;


    // 1.  Crear una propiedad que tenga los mismos campos del formulario
    public $imageEdit = [
        'name' => 'required',
        'location' => 'required',
        'description' =>'required',
        'note' => 'required',
        'note1' => 'required',
    ];

    public function mount(Image $image){

        $this->image = $image;
        $this->image_id = $image->id;
        $this->imageEditId = $this->image->id;

        $image = Image::find($this->image->id);
        $this->imageEditId = $this->image->id;


        // Muesta estos valores en el formulario
        $this->imageEdit['name'] = $image->name;
        $this->imageEdit['location'] = $image->location;
        $this->imageEdit['description'] = $image->description;
        $this->imageEdit['note'] = $image->note;
        $this->imageEdit['note1'] = $image->note1;
    }

    public function render()
    {
        $this->image = Image::find($this->image->id);
        $this->imageEditId = $this->image->id;

        // Muesta estos valores en el formulario
        $this->imageEdit['name'] = $this->image->name;
        $this->imageEdit['location'] = $this->image->location;
        $this->imageEdit['description'] = $this->image->description;
        $this->imageEdit['note'] = $this->image->note;
        $this->imageEdit['note1'] = $this->image->note1;

        return view('livewire.admin.page.edit-image');
    }

    // MASTER CLASS - Actualiza la fecha
    // a) Llamamos a la propiedad: image
    // b) Le pasamos el metodo: save
    // c) Esto va ser que cualquier cambio que hallamos hecho
    // en la propiedad : image, se actualice en la base de datos

    public function save(){

        $image = Image::find($this->imageEditId);

        $image->update([
            'name' => $this->imageEdit['name'],
            'location' => $this->imageEdit['location'],
            'description' => $this->imageEdit['description'],
            'note' => $this->imageEdit['note'],
            'note1' => $this->imageEdit['note1'],
        ]);

        $this->reset(['open','imageEdit','imageEditId']);

        // DISPATCH - Emite un imageo, para ser escuchado por otro componente de livewire
        // EJEMPLO - $this->dispatch('post-created', title: $post->title);
        // En este caso para actusalizar la lista de partes
        $this->dispatch('render-list-images');

    }

    public function hide(){

        // NO SE ESTA USANDO

        $this->image->status ='HIDE';
        $this->image->save();  //Guardar los cambios
        $this->reset(['open']); //Reset la variable open, para cerra el formulario(Modal)

        $this->dispatch('render-images');
    }

}
