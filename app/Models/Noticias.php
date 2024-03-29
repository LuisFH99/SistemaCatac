<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    use HasFactory;
    protected $table = 'noticias';
    protected $fillable=[
        'id',
        'titulo',
        'descripcion',
        'hora',
        'fecha',
        'posicion',
        'activo',
        'borrado',
    ];
    public $timestamps = false;
    
    public function noticiaimagenes()
    {
        return $this->belongsToMany(Imagenes::class, 'imagenes_has_noticias');
    }
}
