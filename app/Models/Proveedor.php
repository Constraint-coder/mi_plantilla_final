<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Proveedor extends Model
{
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
