<?php

namespace App\Livewire\Admin\Page;

use App\Models\Page;
use App\Models\Sectionx;
use Livewire\Component;
use Livewire\Attributes\On;

class PageSections extends Component
{
    public $sectionxes;
    public $page, $page_id;

    public function mount(){
        $this->page = Page::first();    // Por default usa la primera pagina
        $this->sectionxes = $this->page->sectionxes;
    }

    #[On('render-list')] //ESCUCHADOR DE EVENTO
    public function render()
    {
        $this->sectionxes = $this->page->sectionxes;
        return view('livewire.admin.page.page-sections');
    }

    #[On('send-page')] //ESCUCHADOR DE EVENTO
    public function getPage(Page $page)
    {
        $this->page = $page;
        $this->page_id = $page->id;

        //dd($this->page);
    }

    public function delete_section(Sectionx $sectionx)
    {
        // Borra un registro especifico, sin importar nada (relacion uno a muchos)
        $sectionx->delete();
        //dd($item);
    }

        public function update_status($id)
    {
        $sectionx = Sectionx::find($id);

        switch ($sectionx->status) {
            case 'ACTIVE':
                $sectionx->status = 'INACTIVE';
                break;
            case 'INACTIVE':
                $sectionx->status = 'ACTIVE';
                break;
            default:
                $sectionx->status = 'INACTIVE';
                break;
        }

        $sectionx->save();

    }

}
