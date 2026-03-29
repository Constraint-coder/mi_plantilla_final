<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Producto;

class Proveedor extends Model
{
     use SoftDeletes; 
    protected $table = 'proveedores';

     protected $fillable= [
        'nombre',
        'telefono',
        'estado',

    ];
    public function productos()
    {
        return $this->hasMany(Producto::class);

    }
}
