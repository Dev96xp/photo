<?php

namespace App\Livewire\Admin\Session;

use App\Models\PhotoSession;
use App\Models\SessionGallery;
use Livewire\Component;
use Livewire\Attributes\On;

class CreateSessionGallery extends Component
{
    public $open = false;
    public $session;

    public $name, $code, $note, $status = 'ACTIVE';

    public function mount(PhotoSession $session)
    {
        $this->session = $session;
    }

    #[On('send-session')]
    public function getSession(PhotoSession $session)
    {
        $this->session = $session;
    }

    public function render()
    {
        return view('livewire.admin.session.create-session-gallery');
    }

    public function save()
    {
        $this->validate([
            'name' => 'required',
            'code' => 'required|unique:session_galleries,code|max:10',
        ]);

        $this->session->galleries()->create([
            'name'   => $this->name,
            'code'   => strtoupper($this->code),
            'status' => $this->status,
            'note'   => $this->note,
        ]);

        $this->reset(['open', 'name', 'code', 'note']);
        $this->status = 'ACTIVE';
        $this->dispatch('render-session-galleries');
    }
}
