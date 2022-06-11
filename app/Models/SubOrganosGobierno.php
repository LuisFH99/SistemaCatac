<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubOrganosGobierno extends Model
{
    use HasFactory;
    protected $table = 'sub_organos_gobierno';
    protected $fillable=[
        'id', 
        'nombre', 
        'descripcion', 
        'posicion', 
        'activo', 
        'borrado', 
        'organo_gobierno_id', 
        'sub_organos_gobierno_id',
    ];
    public $timestamps = false;
}
