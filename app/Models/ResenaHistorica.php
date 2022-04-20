<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResenaHistorica extends Model
{
    use HasFactory;
    protected $table = 'resena_historica';
    protected $fillable=[
        'id',
        'titulo',
        'descripcion',
        'posicion',
        'activo',
        'borrado',
    ];
    public $timestamps = false;

    public function resenaimagenes()
    {
        return $this->belongsToMany(Imagenes::class, 'imagen_has_resena');
    }
}
