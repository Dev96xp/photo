<?php

namespace App\Livewire\Admin\Project;

use App\Models\Project;
use Livewire\Component;

class EditProject extends Component
{
    public $open = false;
    // 1.  Crear una propiedad que tenga los mismos campos del formulario
    public $projectEdit = [
        'name' => '',
        'owner' => '',
        'address' => '',
        'company' => '',
        'phone' => '',
        'email' => '',
        'status' => '',
        'city' => '',
        'state' => '',
        'zip' => '',
        'description' => '',
    ];
    public $project, $projectEditId; // Proyecto actual


    public function mount(Project $project)
    {

        $this->project = $project;

        $project = Project::find($this->project->id);
        $this->projectEditId = $this->project->id;

        // Muestra estos valores en el formulario
        $this->projectEdit['name'] = $project->name;
        $this->projectEdit['owner'] = $project->owner;
        $this->projectEdit['address'] = $project->address;
        $this->projectEdit['company'] = $project->company;
        $this->projectEdit['phone'] = $project->phone;
        $this->projectEdit['email'] = $project->email;
        $this->projectEdit['status'] = $project->status;
        $this->projectEdit['city'] = $project->city;
        $this->projectEdit['state'] = $project->state;
        $this->projectEdit['zip'] = $project->zip;
        $this->projectEdit['description'] = $project->description;
    }

    public function render()
    {
        return view('livewire.admin.project.edit-project');
    }


    public function update()
    {
        $project = Project::find($this->projectEditId);

        $project->update([
            'name' => $this->projectEdit['name'],
            'owner' => $this->projectEdit['owner'],
            'address' => $this->projectEdit['address'],
            'company' => $this->projectEdit['company'],
            'phone' => $this->projectEdit['phone'],
            'email' => $this->projectEdit['email'],
            'status' => $this->projectEdit['status'],
            'city' => $this->projectEdit['city'],
            'state' => $this->projectEdit['state'],
            'zip' => $this->projectEdit['zip'],
            'description' => $this->projectEdit['description'],
        ]);

        $this->reset(['open']);

        // DISPATCH - Emite un evento, para ser escuchado por otro componente de livewire
        // EJEMPLO - $this->dispatch('post-created', title: $post->title);
        // En este caso para actusalizar la lista de partes
        $this->dispatch('render-projects-list');
    }
}
