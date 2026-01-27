<?php

namespace App\Livewire\Admin\Expense;

use App\Models\Expense;
use App\Models\Project;
use App\Models\Vendor;
use Livewire\Component;

class CreateExpense extends Component
{
    public $open = false;
    public $vendors, $vendor_id = "", $name, $cost, $description, $executive_id;
    public $projects, $project_id = "";

    public $cost_id;
    public $sort1 = 'name';


    protected $rules = [
        'vendor_id' => 'required',
        'name' => 'required',
        'description' => 'required',
    ];

    public function mount()
    {
        $this->vendors = Vendor::where('id', '<>', 1)
            ->orderBy($this->sort1, 'asc')
            ->get();

        $this->projects = Project::where('id', '<>', 1)
            ->orderBy($this->sort1, 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.expense.create-expense');
    }

    public function save()
    {
        // Validar los datos
        $this->validate();

        //dd($this->slug);


        $expense = Expense::create([
            'vendor_id' => $this->vendor_id,
            'name' => $this->name,
            'cost' => $this->cost,
            'description' => $this->description,
            'executive_id' => auth()->user()->id,  // Grupo de tallas por defult
            'project_id' => $this->project_id,
        ]);

        // 5. Una vez usadas la porpiedades, limpia las propiedades (reset)
        //    y cierra el MODAL tambien
        $this->reset([
            'open',
            'vendor_id',
            'name',
            'cost',
            'description',
            'executive_id'
        ]);

        // 6. En este caso para actualizar la lista de productos
        $this->dispatch('render-list');
    }
}
