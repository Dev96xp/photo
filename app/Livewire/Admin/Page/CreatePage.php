<?php

namespace App\Livewire\Admin\Page;

use App\Models\Page;
use Livewire\Component;

class CreatePage extends Component
{
    public $open = false;
    public $name, $description, $route, $active, $status;

    // MASTER CLASS
    // SUPER IMPORTATNTE ESTAS REGLAS DE VALIDACION,
    // PARA QUE LOS VALORES APARESCAN EN EL FORMULARIO
    // ESTO ME PERMITIRA USAR LAS PROPIEDADES DEL OBJETO EN EL FORMULARIO

    protected $rules = [
        'name' => 'required|max:30',
        'description' => 'required',
        'route' => 'required',
        'active' => 'required',
        'status' => 'required',
    ];

    public function render()
    {
        return view('livewire.admin.page.create-page');
    }

    public function create_page()
    {
        // 1. Validar los datos
        $this->validate();

        // 2. Crea un nueva page
        $page = Page::create([
            'name' => $this->name,
            'status' => 'Active',
            'description' => $this->description,
            'route' => $this->route,
            'active' => $this->active,
            'status' => $this->status,
        ]);

        // 3. Reset Variable - Una vez usadas la porpiedades, limpia las propiedades (reset)
        //    y cierra el MODAL tambien
        $this->reset(['open', 'name']);

        // 4. En este caso para actualizar la lista de productos
        $this->dispatch('render-list');
    }
}
