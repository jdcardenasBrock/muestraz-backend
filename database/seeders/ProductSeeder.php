<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $categories = Category::all();

        if ($categories->count() < 3) {
            $this->command->error('Necesitas al menos 3 categorías.');
            return;
        }

        $sampleTexts = [
            'textodestacado' => 'Producto destacado para probar o comprar.',
            'descripcionlarga' => 'Esta es la descripción larga del producto. Incluye detalles importantes sobre el uso, beneficios y características del producto.',
        ];

        $products = [
            // Productos de Belleza
            [
                'nombre' => 'Shampoo Muestra',
                'tipo' => 'producto',
                'category_id' => $categories[0]->id,
                'clasificacion' => 'venta',
                'valor' => 44000,
                'valormembresia' => 30000,
                'destacado'=>1,
                'descuento' => null,
                'solomembresia' => false,
                'cantidadinventario' => 100,
                'controlarinventario' => true,
                'imagenuno_path' => 'products/shampoo.jpg',
            ],
            [
                'nombre' => 'Crema Protectora Facial La-Roche',
                'tipo' => 'producto',
                'category_id' => $categories[0]->id,
                'clasificacion' => 'muestra',
                'valor' => null,
                'descuento' => null,
                'destacado'=>1,
                'solomembresia' => false,
                'cantidadinventario' => 200,
                'controlarinventario' => true,
                'imagenuno_path' => 'products/protector1.png',
                'imagendos_path' => 'products/protector1.png',
            ],
        ];

        // Agregar textos destacados y descripción larga a todos
        foreach ($products as &$p) {
            $p['textodestacado'] = $p['textodestacado'] ?? $sampleTexts['textodestacado'];
            $p['descripcionlarga'] = $p['descripcionlarga'] ?? $sampleTexts['descripcionlarga'];
        }

        // Guardar productos
        foreach ($products as $p) {
            Product::updateOrCreate(['nombre' => $p['nombre']], $p);
        }
    }
}
