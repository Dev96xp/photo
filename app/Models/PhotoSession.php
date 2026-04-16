<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoSession extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'date' => 'date',
    ];

    // Relacion inversa: pertenece a un proyecto
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Una session tiene muchas galerías
    public function galleries()
    {
        return $this->hasMany(SessionGallery::class);
    }
}
