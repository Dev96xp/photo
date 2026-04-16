<?php

namespace App\Livewire\Admin\Session;

use App\Models\PhotoSession;
use App\Models\SessionGallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\On;

class GalleriesIndex extends Component
{
    public $session;

    public function mount(PhotoSession $session)
    {
        $this->session = $session;
    }

    #[On('render-session-galleries')]
    public function render()
    {
        $this->session = $this->session->fresh();
        return view('livewire.admin.session.galleries-index');
    }

    public function update_status($id)
    {
        $gallery = SessionGallery::find($id);

        switch ($gallery->status) {
            case 'ACTIVE':
                $gallery->status = 'VIEW';
                break;
            case 'VIEW':
                $gallery->status = 'HIDE';
                break;
            case 'HIDE':
                $gallery->status = 'ACTIVE';
                break;
            default:
                $gallery->status = 'ACTIVE';
        }

        $gallery->save();
        $this->dispatch('render-session-galleries');
    }

    #[On('delete_session_gallery')]
    public function delete_gallery(int $galleryId)
    {
        $gallery = SessionGallery::findOrFail($galleryId);

        foreach ($gallery->images as $image) {
            Storage::delete('public/' . $image->url);
            $image->delete();
        }

        $gallery->delete();
        $this->session = $this->session->fresh();
    }
}
