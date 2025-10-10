<?php

namespace App\Livewire\Admin\Page;

use App\Models\Page;
use Livewire\Component;
use Livewire\Attributes\On;

class PageIndex extends Component
{
    public $pages;
    public $page_id;
    public $selecionado;

    public function mount()
    {
        $this->pages = Page::all();
    }


    #[On('render-list')] //ESCUCHADOR DE EVENTO
    public function render()
    {
        $this->pages = Page::all();
        return view('livewire.admin.page.page-index');
    }

    public function select_page(Page $page)
    {
        //dd($page);
        //$this->page_id = $page->id;  // (1,2,3,4,)
        $this->selecionado = $page->name;   //agrege esto, para otra cosa

        $this->dispatch('send-page', page: $page);  // ENVIO EL PAQUETE SELECIONADO POR EL USUARIO
        //$this->dispatch('post-created', title: $post->title);  ESTE ES SOLO UN EJEMPLO

    }

    public function delete_page(Page $page)
    {
        // NO SE ESTA USANDO MOMENTANEAMENTE

        // Borra un registro especifico, sin importar nada (relacion uno a muchos)
        //$page->delete();
        //dd($item);
        // 4. En este caso para actualizar la lista de productos
        $this->dispatch('render-list');
    }

    public function update_status($id)
    {
        $page = Page::find($id);

        switch ($page->status) {
            case 'ACTIVE':
                $page->status = 'INACTIVE';
                break;

            case 'INACTIVE':
                $page->status = 'HIDE';
                break;

            case 'HIDE':
                $page->status = 'ACTIVE';
                break;

            default:
                $page->status = 'INACTIVE';
                break;
        }

        $page->save();

        // 4. En este caso para actualizar la lista de productos
        $this->dispatch('render-list');
    }
}
