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
        'lugar_procedencia',
        'posicion',
        'activo',
        'borrado',
        'persona_id',
    ];
    public $timestamps = false;
}
