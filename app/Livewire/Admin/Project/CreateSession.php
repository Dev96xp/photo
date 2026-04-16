<?php

namespace App\Livewire\Admin\Project;

use App\Models\PhotoSession;
use App\Models\Project;
use Livewire\Component;

class CreateSession extends Component
{
    public $open = false;
    public $project;

    public $name, $date, $time, $type = 'GENERAL', $location, $note, $sort_order = 1;

    public $session_types = ['GENERAL', 'PORTRAIT', 'WEDDING', 'FAMILY', 'COMMERCIAL', 'REAL ESTATE', 'EVENT', 'OTHER'];

    public function mount(Project $project)
    {
        $this->project = $project;
        // Sugerir el siguiente número de sesión
        $this->sort_order = $project->sessions()->where('status', '!=', 'DELETED')->count() + 1;
    }

    public function render()
    {
        return view('livewire.admin.project.create-session');
    }

    public function save()
    {
        $this->validate([
            'name'       => 'required',
            'sort_order' => 'required|integer|min:1|max:10',
            'type'       => 'required',
        ]);

        $this->project->sessions()->create([
            'name'       => $this->name,
            'date'       => $this->date ?: null,
            'time'       => $this->time ?: null,
            'type'       => $this->type,
            'location'   => $this->location,
            'note'       => $this->note,
            'sort_order' => $this->sort_order,
            'status'     => 'SCHEDULED',
        ]);

        $this->reset(['open', 'name', 'date', 'time', 'type', 'location', 'note']);
        $this->type = 'GENERAL';
        $this->sort_order = $this->project->sessions()->where('status', '!=', 'DELETED')->count() + 1;

        $this->dispatch('render-sessions-list');
    }
}
