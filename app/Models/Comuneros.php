<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comuneros extends Model
{
    use HasFactory;
    protected $table = 'comuneros';
    protected $fillable=[
        'id',
        'codigo',
        'posicion',
        'activo',
        'borrado',
        'persona_id',
        'imagenes_id',
    ];
    public $timestamps = false;
}
