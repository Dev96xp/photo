<?php

namespace App\Livewire\Admin\Project;

use App\Models\Ids;
use App\Models\Project;
use App\Models\User;
use Livewire\Component;

class CreateProject extends Component
{
    public $open = false;

    public $name, $address, $owner, $company, $phone, $email, $status;
    public $city, $state, $zip;
    public $description;

    public $selected_user_id = '';  // Cliente seleccionado para auto-fill

    public function render()
    {
        $users = User::orderBy('name')->get(['id', 'name', 'email', 'phone', 'company', 'address', 'city', 'state', 'zip']);
        return view('livewire.admin.project.create-project', compact('users'));
    }

    public function fillFromUser($userId)
    {
        if (!$userId) {
            return;
        }

        $user = User::find($userId);
        if (!$user) return;

        $this->owner   = $user->name;
        $this->email   = $user->email;
        $this->phone   = $user->phone ?? '';
        $this->company = $user->company ?? '';
        $this->address = $user->address ?? '';
        $this->city    = $user->city ?? '';
        $this->state   = $user->state ?? '';
        $this->zip     = $user->zip ?? '';
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|unique:projects,name',
            'owner' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',

        ]);

        $new_project_id = Ids::find(10); // Next id para: [projects]

        Project::create([
            'code' => 'P' . $new_project_id->nextid,
            'name' => $this->name,
            'owner' => $this->owner,
            'address' => $this->address,
            'company' => $this->company,
            'phone' => $this->phone,
            'email' => $this->email,
            'status' => $this->status,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            'description' => $this->description,
            'status' => 'ACTIVE',

        ]);

        $this->reset(['open', 'name', 'address', 'owner', 'company', 'phone', 'email', 'status', 'city', 'state', 'zip', 'description', 'selected_user_id']);

        // 6. En este caso para actualizar la lista de projectos
        $this->dispatch('render-projects-list');
    }
}
