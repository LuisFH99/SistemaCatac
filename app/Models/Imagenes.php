<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    use HasFactory;
    protected $table = 'imagenes';
    protected $fillable=[
        'id',
        'titulo',
        'url_imagen',
        'posicion',
        'activo',
        'borrado',
    ];
    public $timestamps = false;

    public function imagenesresena()
    {
        return $this->belongsToMany(ResenaHistorica::class, 'imagen_has_resena');
    }
}
