<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenios extends Model
{
    use HasFactory;
    protected $table = 'convenios';
    protected $fillable=[
        'id',
        'titulo',
        'institucion',
        'fech_inicio',
        'fech_fin',
        'decripcion',
        'url_documento',
        'posicion',
        'activo',
        'borrado',
    ];
    public $timestamps = false;
}
