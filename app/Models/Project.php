<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PhotoSession;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    const ACTIVE = 1;
    const CANCELLED = 2;
    const REVISION = 3;

    //Asignacion masiva
    protected $guarded = ['id'];

    // Relacion uno a muchos: un proyecto tiene muchas sesiones fotograficas
    public function sessions()
    {
        return $this->hasMany(PhotoSession::class)->orderBy('sort_order');
    }
}
