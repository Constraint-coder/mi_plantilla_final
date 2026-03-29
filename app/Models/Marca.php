<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Producto;
class Marca extends Model
{
     use SoftDeletes; 
   protected $table = 'marcas';
     protected $fillable= [
        'nombre',
        'estado',

    ];
    public function productos()
    {
        return $this->hasMany(Producto::class);

    }
}
