<?php

namespace App\Livewire\Admin\Session;

use App\Models\SessionGallery;
use App\Models\Image;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;

class DisplayGallery extends Component
{
    public $gallery;

    public function mount(SessionGallery $gallery)
    {
        $this->gallery = $gallery;
    }

    #[On('refresh-session-gallery')]
    public function refresh()
    {
        $this->gallery = $this->gallery->fresh();
    }

    public function render()
    {
        return view('livewire.admin.session.display-gallery');
    }

    public function deleteImage(int $imageId)
    {
        $image = Image::findOrFail($imageId);
        Storage::delete('public/' . $image->url);
        $image->delete();
        $this->gallery = $this->gallery->fresh();
    }
}
