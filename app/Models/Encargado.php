<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{
    use HasFactory;
    protected $table = 'encargado';
    protected $fillable=[
        'id',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'posicion',
        'activo',
        'borrado',
        'persona_id',
        'imagenes_id',
    ];
    public $timestamps = false;

    public function persona()
    {
        return $this->belongsTo(Persona::class,'persona_id','id');
    }
    public function imagenes()
    {
        return $this->belongsTo(Imagenes::class,'imagenes_id','id');
    }
}
