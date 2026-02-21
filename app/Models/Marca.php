<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
class Marca extends Model
{
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
