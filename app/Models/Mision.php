<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mision extends Model
{
    use HasFactory;
    protected $table = 'mision';
    protected $fillable=[
        'id',
        'descripcion',
        'posicion',
        'activo',
        'borrado',
        'imagenes_id'
    ];
    public $timestamps = false; 
}
