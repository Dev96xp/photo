<?php

namespace App\Livewire\Admin\Expense;

use App\Models\Expense;
use App\Models\Project;
use App\Models\Vendor;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ExpensesIndex extends Component
{

    protected $paginationTheme = "bootstrap";
    // Ayuda para que la PAGINACION sea dinamica, osea se actualizan
    // los datos en pantalla, sin actualizar la pantalla completa.
    use WithPagination;

    public $search;
    public $vendor_id = "";
    public $project_id = "";

    public $direction = 'desc';
    public $sort = 'created_at';
    public $sort1 = 'name';



    public function mount()
    {
        $this->vendor_id = Vendor::first()->id;
        $this->project_id = Project::first()->id;
    }


    #[On('render-list')] //ESCUCHADOR DE EVENTO
    public function render()
    {
        // Muestra sin excepcion todos los gastos
        if ($this->vendor_id == 1) {
            $vendors = Vendor::where('code', '<>', 'xx')
                ->orderBy($this->sort1, 'asc')
                ->get();
            $projects = Project::where('code', '<>', 'xx')
                ->orderBy($this->sort1, 'asc')
                ->get();

            $expenses = Expense::where('vendor_id', '<>', 0)
                ->where('status', '<>', Expense::CANCELADO)
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate(30);
        } else {
            $vendors = Vendor::where('code', '<>', 'xx')
                ->orderBy($this->sort1, 'asc')
                ->get();

            $projects = Project::where('code', '<>', 'xx')
                ->orderBy($this->sort1, 'asc')
                ->get();

            $expenses = Expense::where('vendor_id', $this->vendor_id)
                ->where('project_id', $this->project_id)
                ->where('status', '<>', Expense::CANCELADO)
                ->where('name', 'LIKE', '%' . $this->search . '%')
                ->orderBy($this->sort, $this->direction)
                ->paginate(30);
        }

        return view('livewire.admin.expense.expenses-index', compact('expenses', 'vendors', 'projects'));
    }

    public function vendorId($vendor_id)
    {
        $this->vendor_id = $vendor_id;
        dd($this->vendor_id);
    }

    public function delete_expense(Expense $expense)
    {
        // Actualizar es status a 4
        $expense->status = Expense::CANCELADO;  //Indica que este item se cancelo, pero no se borro, solo se oculto
        $expense->save();  //Guardar los cambios
    }

    // Limpiar la pagina
    // Para que la busqueda sea atravez de todas la paginas
    public function limpiar_page()
    {
        $this->resetPage();
    }
}
