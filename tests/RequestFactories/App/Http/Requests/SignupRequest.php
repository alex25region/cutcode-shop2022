<?php

namespace Tests\RequestFactories\App\Http\Requests;

use Worksome\RequestFactories\RequestFactory;

class SignupRequest extends RequestFactory
{
    public function definition(): array
    {
        return [
          // 'email' => $this->faker->email,
        ];
    }
}
