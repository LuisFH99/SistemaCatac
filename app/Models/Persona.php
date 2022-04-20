<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;
    protected $table = 'persona';
    protected $fillable=[
        'id',
        'DNI',
        'nombre',
        'apell_pat',
        'apell_mat',
        'email',
        'telefono',
        'posicion',
        'activo',
        'borrado',
    ];
    public $timestamps = false;
}
