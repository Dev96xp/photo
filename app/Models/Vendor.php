<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    /** @use HasFactory<\Database\Factories\VendorFactory> */
    use HasFactory;

        //Asignacion masiva
    protected $guarded = ['id'];

    // RELACION UNO A MUCHOS

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
