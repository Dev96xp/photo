<?php

namespace App\Livewire\Photography;

use App\Models\Image;
use App\Models\SessionGallery;
use Livewire\Component;

class GalleryViewer extends Component
{
    public SessionGallery $gallery;

    public function mount(SessionGallery $gallery)
    {
        $this->gallery = $gallery;
    }

    public function toggleHeart(int $imageId)
    {
        $image = Image::findOrFail($imageId);
        $image->status = ($image->status == 2) ? 1 : 2;
        $image->save();
        $this->gallery = $this->gallery->fresh(['images']);
    }

    public function render()
    {
        return view('livewire.photography.gallery-viewer');
    }
}
