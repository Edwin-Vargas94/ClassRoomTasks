<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{

    use HasFactory;
    //EGVG 05/04/25: Define los campos de la tabla que son asignables en masa.
    protected $fillable = [

        'estado'
    ];
}
