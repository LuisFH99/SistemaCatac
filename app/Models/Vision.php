<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vision extends Model
{
    use HasFactory;
    protected $table = 'vision';
    protected $fillable=[
        'id',
        'descripcion',
        'posicion',
        'activo',
        'borrado',
        'imagenes_id',
    ];
    public $timestamps = false;

    public function imagenes()
    {
        return $this->belongsTo(Imagenes::class,'imagenes_id','id');
    }
}
