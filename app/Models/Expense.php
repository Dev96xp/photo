<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /** @use HasFactory<\Database\Factories\ExpenseFactory> */
    use HasFactory;

    const ACTIVO = 1;
    const CANCELADO = 2;
    const REVISION = 3;

    //Asignacion masiva
    protected $guarded = ['id'];

    // RELACION MUCHOS A UNO
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }


    // Relacion *** UNO A MUCHOS POLIMORFICA
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
