<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;
    protected $table = 'funcionarios';
    protected $fillable=[
        'id',
        'descripcion',
        'fech_inicio',
        'fech_fin',
        'posicion',
        'activo',
        'borrado',
        'organo_gobierno_id',
        'imagenes_id',
        'persona_id',
        'cargo_id',
    ];
    public $timestamps = false;
}
