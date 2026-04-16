<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionGallery extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Pertenece a una sesión fotográfica
    public function session()
    {
        return $this->belongsTo(PhotoSession::class, 'photo_session_id');
    }

    // Relación polimórfica de imágenes (igual que Gallery)
    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
