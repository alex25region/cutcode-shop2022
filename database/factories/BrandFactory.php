<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;


class BrandFactory extends Factory
{

    public function definition() : array
    {
        return [
            'title' => $this->faker->company(),
            'thumbnail' => '', // в 3 части
        ];
    }
}
