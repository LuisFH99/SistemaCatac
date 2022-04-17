<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosGenerales extends Model
{
    use HasFactory;
    protected $table = 'datos_generales';
    protected $fillable=[
        'id',
        'descripcion',
        'posicion',
        'activo',
        'borrado',
        'tipo_dato_id',
    ];
    public $timestamps = false;
}
