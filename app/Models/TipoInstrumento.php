<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoInstrumento extends Model
{
    use HasFactory;
    protected $table = 'tipo_instrumento';
    protected $fillable=[
        'id',
        'tipo',
        'posicion',
        'activo',
        'borrado',
    ];
    public $timestamps = false;
}
