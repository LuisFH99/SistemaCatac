<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstrumentosGestion extends Model
{
    use HasFactory;
    protected $table = 'instrumentos_gestion';
    protected $fillable=[
        'id',
        'descripcion',
        'url_documento',
        'posicion',
        'activo',
        'borrado',
        'tipo_instrumento_id',
    ];
    public $timestamps = false;
}
