<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws \Exception
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'category_id' => Category::all()->random()->id,
            'description' => $this->faker->realText(),
            'price' => random_int(100,1000),
        ];
    }
}