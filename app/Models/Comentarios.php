<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentarios extends Model
{
    use HasFactory;
    protected $table = 'comentarios';
    protected $fillable=[
        'id',
        'nombre',
        'fecha_hora',
        'comentario',
        'posicion',
        'activo',
        'borrado',
        'noticias_id',
    ];
    public $timestamps = false;
}
