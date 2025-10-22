<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         {
        $categories = [
            [
                'name' => 'Belleza',
                'image_path' => 'categories/belleza.jpg', // puedes poner una URL si deseas
                'order' => 1,
                'active' => 1,
                'target' => '_blank',
            ],
            [
                'name' => 'Cuidado Personal',
                'image_path' => 'categories/cuidado.jpg',
                'order' => 2,
                'active' => 1,
                'target' => '_blank',
            ],
            [
                'name' => 'Mascotas',
                'image_path' => 'categories/mascota.jpg',
                'order' => 3,
                'active' => 1,
                'target' => '_blank',
            ],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(
                ['name' => $cat['name']], // evita duplicados
                $cat
            );
        }
    }
    }
}
