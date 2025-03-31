<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word,
            'precio' => $this->faker->randomFloat(2, 10, 1000),
            'descripcion' => $this->faker->sentence,
            'imagen' => 'productos/' . $this->faker->image('public/storage/productos', 400, 300, null, false),
            'tipo' => $this->faker->randomElement(['Consolas', 'Controles', 'Accesorios', 'Juegos']),
            'categoria' => $this->faker->randomElement(['Recomendados', 'Ofertas', 'Nuevos', 'Destacados', 'Sin categoría']),
        ];
    }
}
