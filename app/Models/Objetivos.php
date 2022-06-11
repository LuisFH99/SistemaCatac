<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objetivos extends Model
{
    use HasFactory;
    protected $table = 'objetivos';
    protected $fillable=[
        'id',
        'objetivo',
        'posicion',
        'activo',
        'borrado',
        'imagenes_id',
        'objetivos_id',
        'tipo_objetivo_id',
    ];
    public $timestamps = false;

    public function ObjetivoPadre(){
        return $this->belongsTo(Objetivos::class,'objetivos_id','id');
    }

    public function ObjetivoHijo(){
        return $this->hasMany(Objetivos::class,'objetivos_id','id' );
    }

    public function tipo(){
        return $this->belongsTo(TipoObjetivo::class,'tipo_objetivo_id','id');
    }
    public function imagenes()
    {
        return $this->belongsTo(Imagenes::class,'imagenes_id','id');
    }

}
