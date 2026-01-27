<?php

namespace App\Livewire\Admin\Expense;

use Livewire\Component;

class DisplayImage extends Component
{
    public $open = false;
    public $expense;
    public $image;

    public function render()
    {
        return view('livewire.admin.expense.display-image');
    }
}
