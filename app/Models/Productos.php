<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable=[
        'id',
        'producto',
        'descripcion',
        'posicion',
        'Activo',
        'borrado',
        'imagenes_id',
        'servicios_id',
    ];
    public $timestamps = false;
    
    public function imagenes()
    {
        return $this->belongsTo(Imagenes::class,'imagenes_id','id');
    }
}
