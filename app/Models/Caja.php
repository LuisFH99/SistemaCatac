<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caja extends Model
{
    use HasFactory;
    protected $table = 'caja';
    protected $fillable=[
        'id',
        'nom_banco',
        'num_cuenta',
        'posicion',
        'activo',
        'borrado',
    ];
    public $timestamps = false;
}
