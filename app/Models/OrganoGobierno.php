<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganoGobierno extends Model
{
    use HasFactory;
    protected $table = 'organo_gobierno';
    protected $fillable=[
        'id',
        'nombre',
        'posicion',
        'activo',
        'borrado',
    ];
    public $timestamps = false;
}
