<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicados extends Model
{
    use HasFactory;
    protected $table = 'comunicados';
    protected $fillable=[
        'id',
        'titulo',
        'descripcion',
        'fecha',
        'hora',
        'posicion',
        'activo',
        'borrado',
        'imagenes_id',
    ];
    public $timestamps = false;
}
