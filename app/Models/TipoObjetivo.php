<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoObjetivo extends Model
{
    use HasFactory;
    protected $table = 'tipo_objetivo';
    protected $fillable=[
        'id',
        'tipo',
        'estado',
        'borrado',
    ];
    public $timestamps = false;
}
