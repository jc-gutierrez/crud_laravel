<?php

use Illuminate\Database\Seeder;
use App\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            [
                'nombre' => 'Calzados de Varon',
                'cantidad' => 100,
                'precio' => 215,
                'descripcion' => 'Calzados para varones, niños y adultos'
            ], [
                'nombre' => 'Calzados de Mujer',
                'cantidad' => 200,
                'precio' => 300,
                'descripcion' => 'Calzados para damas, niñas y adultos'
            ]
        ];
        foreach ($productos as $producto) {
            Producto::firstOrCreate($producto);
        }
    }
}
