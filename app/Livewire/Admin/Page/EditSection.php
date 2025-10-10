<?php

namespace App\Livewire\Admin\Page;

use App\Models\Sectionx;
use Livewire\Component;

class EditSection extends Component

{

    public $sectionx_id;
    public $open = false;
    public $sectionx, $type = 5;

    public $sectionxEditId;


    // 1.  Crear una propiedad que tenga los mismos campos del formulario
    public $sectionxEdit = [
        'name' => 'required',
        'note2' => 'required',
        'description' =>'required',
        'description1' => 'required',
    ];

    public function mount(Sectionx $sectionx){

        $this->sectionx = $sectionx;
        $this->sectionx_id = $sectionx->id;
        $this->sectionxEditId = $this->sectionx->id;

        $sectionx = Sectionx::find($this->sectionx->id);
        $this->sectionxEditId = $this->sectionx->id;


        // Muesta estos valores en el formulario
        $this->sectionxEdit['name'] = $sectionx->name;
        $this->sectionxEdit['note2'] = $sectionx->note2;
        $this->sectionxEdit['description'] = $sectionx->description;
        $this->sectionxEdit['description1'] = $sectionx->description1;

    }

    public function render()
    {
        $this->sectionx = Sectionx::find($this->sectionx->id);
        $this->sectionxEditId = $this->sectionx->id;

        // Muesta estos valores en el formulario
        $this->sectionxEdit['name'] = $this->sectionx->name;
        $this->sectionxEdit['note2'] = $this->sectionx->note2;
        $this->sectionxEdit['description'] = $this->sectionx->description;
        $this->sectionxEdit['description1'] = $this->sectionx->description1;


        return view('livewire.admin.page.edit-section');
    }

    // MASTER CLASS - Actualiza la fecha
    // a) Llamamos a la propiedad: sectionx
    // b) Le pasamos el metodo: save
    // c) Esto va ser que cualquier cambio que hallamos hecho
    // en la propiedad : sectionx, se actualice en la base de datos

    public function save(){

        $sectionx = Sectionx::find($this->sectionxEditId);

        $sectionx->update([
            'name' => $this->sectionxEdit['name'],
            'note2' => $this->sectionxEdit['note2'],
            'description' => $this->sectionxEdit['description'],
            'description1' => $this->sectionxEdit['description1'],
        ]);

        $this->reset(['open','sectionxEdit','sectionxEditId']);

        // DISPATCH - Emite un sectionxo, para ser escuchado por otro componente de livewire
        // EJEMPLO - $this->dispatch('post-created', title: $post->title);
        // En este caso para actusalizar la lista de partes
        $this->dispatch('render-list');

    }

    public function hide(){

        // NO SE ESTA USANDO

        $this->sectionx->status ='HIDE';
        $this->sectionx->save();  //Guardar los cambios
        $this->reset(['open']); //Reset la variable open, para cerra el formulario(Modal)

        $this->dispatch('render-list');
    }

}


