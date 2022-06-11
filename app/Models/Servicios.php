<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;
    protected $table = 'servicios';
    protected $fillable=[
        'id',
        'nom_servicios',
        'descripcion',
        'funciones',
        'posicion',
        'activo',
        'borrado',
        'encargado_id'
    ];
    public $timestamps = false;

    public function encargado()
    {
        return $this->belongsTo(Encargado::class,'encargado_id','id');
    }
    public function productos()
    {
        return $this->hasMany(Productos::class,'servicios_id','id');
    }
}
