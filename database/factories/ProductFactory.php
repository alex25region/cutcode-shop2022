<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition() : array
    {
        return [
            //
            'title' => $this->faker->company(),
            'thumbnail' => '', // в 3 части
            'brand_id' => Brand::query()->inRandomOrder()->value('id'),
            'price' => $this->faker->numberBetween(1000, 10000)
        ];
    }
}
