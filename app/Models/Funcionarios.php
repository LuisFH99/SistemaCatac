<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;
    protected $table = 'funcionarios';
    protected $fillable=[
        'perfil',
        'fech_inicio',
        'fech_fin',
        'profesion',
        'url_cv',
        'posicion',
        'estado',
        'borrado',
        'imagenes_id',
        'persona_id',
        'cargo_id',
        'sub_organos_gobierno_id',
    ];
    public $timestamps = false;
    // public function imagenPerfil(){
    //     return $this->belongsTo(Imagenes::class,'imagenes_id','id');
    // }
    
}
