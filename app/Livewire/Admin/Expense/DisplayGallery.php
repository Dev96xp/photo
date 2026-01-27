<?php

namespace App\Livewire\Admin\Expense;

use App\Models\Expense;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class DisplayGallery extends Component
{
    public $open = false;
    public $show_modal = false;
    public $expense;

    public function mount(Expense $expense)
    {
        $this->expense = $expense;
    }

    public function render()
    {
        return view('livewire.admin.expense.display-gallery');
    }

    // Esta a la escucha de un evento, en este caso viene de de este mismo evento DisplayGallery
    // pero de la vista, especificamente del Dropzone
    #[On('refresh-gallery')]
    public function refreshSection()
    {
        $this->expense = $this->expense->fresh();
    }


    public function deleteImages(Image $image)
    {
        // Aqui borro las imagenes atravez de la carpeta PUBLIC
        $url = 'public/' . $image->url;
        //dd([$url]);
        // MASTER CLASS - Aqui se remplaza la palabra (storage por public) para poder eliminar las imagenes
        //$url = str_replace('storage','public',$image->url);


        //Storage::delete([$image->url]);
        Storage::delete([$url]);          // Borra el archivo fisicamente
        $image->delete();               // Borra el registro de la base de datos

        $this->expense = $this->expense->fresh();
    }

    public function select_image() {

    }

}
