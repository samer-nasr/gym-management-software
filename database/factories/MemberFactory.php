<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Testing\Fakes\Fake;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            "first_name"=> fake()->firstName,
            "last_name"=> fake()->lastName,
            "email"=> fake()->email,
            "address"=> fake()->address,
            "phone"=> fake()->phoneNumber,
        ];
    }
}
