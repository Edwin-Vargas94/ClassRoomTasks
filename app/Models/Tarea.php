<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
//EGVG 07/04/25: Importa el trait HasFactory para habilitar la generación de datos de prueba.
use HasFactory;

//EGVG 07/04/25: Define los campos de la tabla que son asignables en masa.
protected $fillable = [

    'titulo',
    'descripcion',
    'fk_estado',
    'fk_categoria',
    'fk_user_asig',
    'prioridad',
    'user_add',
    'user_mod',
    'fch_vencimiento'
];

public function user() //EGVG 05/04/25: Define una relación que indica que este modelo pertenece a un usuario.
{
    return $this->belongsTo(User::class, 'fk_user_asig');
}
public function estado() //EGVG 05/04/25: Define una relación que indica que este modelo pertenece a un estado.
{
    return $this->belongsTo(Estado::class, 'fk_estado');
}

public function categoria() //EGVG 05/04/25: Define una relación que indica que este modelo pertenece a una categoría.
{
    return $this->belongsTo(Categoria::class, 'fk_categoria');
}

}
