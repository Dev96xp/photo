<?php

namespace App\Livewire\Admin\Project;

use App\Models\PhotoSession;
use Livewire\Component;
use Livewire\Attributes\On;

class QuickEditSession extends Component
{
    public $open = false;

    public $sessionId;
    public $sessionEdit = [
        'name'       => '',
        'date'       => '',
        'time'       => '',
        'type'       => '',
        'location'   => '',
        'note'       => '',
        'sort_order' => 1,
    ];

    public $session_types = ['GENERAL', 'PORTRAIT', 'WEDDING', 'FAMILY', 'COMMERCIAL', 'REAL ESTATE', 'EVENT', 'OTHER'];

    #[On('open-edit-session')]
    public function openModal($sessionId)
    {
        $session = PhotoSession::find($sessionId);
        if (!$session) return;

        $this->sessionId = $sessionId;

        $this->sessionEdit['name']       = $session->name;
        $this->sessionEdit['date']       = $session->date ? $session->date->format('Y-m-d') : '';
        $this->sessionEdit['time']       = $session->time ?? '';
        $this->sessionEdit['type']       = $session->type;
        $this->sessionEdit['location']   = $session->location ?? '';
        $this->sessionEdit['note']       = $session->note ?? '';
        $this->sessionEdit['sort_order'] = $session->sort_order;

        $this->open = true;
    }

    public function render()
    {
        return view('livewire.admin.project.quick-edit-session');
    }

    public function update()
    {
        $this->validate([
            'sessionEdit.name'       => 'required',
            'sessionEdit.sort_order' => 'required|integer|min:1|max:10',
            'sessionEdit.type'       => 'required',
        ]);

        $session = PhotoSession::find($this->sessionId);

        $session->update([
            'name'       => $this->sessionEdit['name'],
            'date'       => $this->sessionEdit['date'] ?: null,
            'time'       => $this->sessionEdit['time'] ?: null,
            'type'       => $this->sessionEdit['type'],
            'location'   => $this->sessionEdit['location'],
            'note'       => $this->sessionEdit['note'],
            'sort_order' => $this->sessionEdit['sort_order'],
        ]);

        $this->open = false;
        $this->dispatch('render-projects-list');
    }
}
