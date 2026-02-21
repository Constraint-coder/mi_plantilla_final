<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;


class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Producto::create([
            'nombre' => 'Cajas', 
            'descripcion' => 'cjas de carton',
            'precio' => 4.4,
            'categoria_id' => 1,
            'marca_id' => 1,
            'proveedor_id' => 1,      

        ]);
    }
    
}
