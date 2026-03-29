<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Marca;
use App\Models\Categoria;
use App\Models\Proveedor;

class Producto extends Model
{
     use SoftDeletes; 
    protected $table = 'productos';   
    protected $fillable= [
        'nombre',
        'descripcion',
        'precio',
        'categoria_id',
        'marca_id',
        'proveedor_id',

    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);

    }
        public function marca()
    {
        return $this->belongsTo(Marca::class);
        
    }
        public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
        
    }
}
