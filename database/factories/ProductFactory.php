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
            'thumbnail' => '',
//            'thumbnail' => $this->faker->image('public/images/products'),
//            'thumbnail' => $this->faker->file(
//                base_path('/tests/Fixtures/images/products'),
//                storage_path('/app/public/images/products'),
//                false
//            ),
            'brand_id' => Brand::query()->inRandomOrder()->value('id'),
            'price' => $this->faker->numberBetween(1000, 10000)
        ];
    }
}
