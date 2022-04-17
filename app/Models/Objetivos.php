<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivos extends Model
{
    use HasFactory;
    protected $table = 'objetivos';
    protected $fillable=[
        'id',
        'objetivo',
        'decripcion',
        'posicion',
        'activo',
        'borrado',
        'imagenes_id',
    ];
    public $timestamps = false;
}
