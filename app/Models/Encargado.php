<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    protected $table = 'encargado';
    protected $fillable=[
        'id',
        'descripcion',
        'fecha_inicio',
        'fecha fin',
        'posicion',
        'activo',
        'borrado',
        'persona_id',
        'servicios_id',
        'imagenes_id',
    ];
    public $timestamps = false;
}
