<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modificatorias extends Model
{
    use HasFactory;
    protected $table = 'modificatorias';
    protected $fillable=[
        'id',
        'url_doc',
        'fecha',
        'posicion',
        'activo',
        'borrado',
        'instrumento_gestion_id'
    ];
    public $timestamps = false;
}
