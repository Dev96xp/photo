<?php

namespace App\Livewire\Admin\Project;

use App\Models\PhotoSession;
use App\Models\Project;
use Livewire\Component;
use Livewire\Attributes\On;

class SessionsIndex extends Component
{
    public $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    #[On('render-sessions-list')]
    public function render()
    {
        $this->project = $this->project->fresh();
        return view('livewire.admin.project.sessions-index');
    }

    #[On('delete_session')]
    public function delete_session(PhotoSession $session)
    {
        $session->status = 'DELETED';
        $session->save();
        $this->project = $this->project->fresh();
    }

    public function update_status($id)
    {
        $session = PhotoSession::find($id);

        switch ($session->status) {
            case 'SCHEDULED':
                $session->status = 'COMPLETED';
                break;
            case 'COMPLETED':
                $session->status = 'CANCELLED';
                break;
            case 'CANCELLED':
                $session->status = 'SCHEDULED';
                break;
            default:
                $session->status = 'SCHEDULED';
        }

        $session->save();
        $this->dispatch('render-sessions-list');
    }
}
