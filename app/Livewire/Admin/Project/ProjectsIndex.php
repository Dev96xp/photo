<?php

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class ProjectsIndex extends Component
{
    protected $paginationTheme = "bootstrap";
    // Ayuda para que la PAGINACION sea dinamica, osea se actualizan
    // los datos en pantalla, sin actualizar la pantalla completa.
    use WithPagination;

    public $sort = 'created_at';

    #[On('render-projects-list')] //ESCUCHADOR DE EVENTO
    public function render()
    {
        $projects = Project::where('status', '<>', 'DELETED')
            ->orderBy($this->sort, 'desc')
            ->paginate(30);

        $archived = Project::where('status', 'DELETED')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('livewire.admin.project.projects-index', compact('projects', 'archived'));
    }

    public function restore(Project $project)
    {
        $project->status = 'ACTIVE';
        $project->save();
        $this->dispatch('render-projects-list');
    }

    // NUEVO 2025
    // 5. Se esta ala eschucha del enevento: 'delete_project' que viene de SweetAlert2 en javascript
    // 6. Y se recibe tambien la variable que biene con sige: $project
    #[On('delete_project')]
    public function delete_project(Project $project)
    {
        // Actualizar es status a 4
        $project->status = 'DELETED';  //Indica que este item se cancelo, pero no se borro, solo se oculto
        $project->save();  //Guardar los cambios
    }


    public function update_status($id)
    {
        $project = Project::find($id);

        switch ($project->status) {
            case 'ACTIVE':
                $project->status = 'CANCELLED';
                break;

            case 'CANCELLED':
                $project->status = 'REVISION';
                break;

            case 'REVISION':
                $project->status = 'ACTIVE';
                break;

            default:
                $project->status = 'ACTIVE';
                break;
        }

        $project->save();
        // 4. En este caso para actualizar la lista de productos
        $this->dispatch('render-projects-list');
    }
}
