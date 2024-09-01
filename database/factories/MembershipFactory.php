<?php

namespace Database\Factories;

use App\Models\Bundle;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "bundle_duration"=> fake()->randomNumber(2),
            "member_id"=> Member::factory(),
            "bundle_id"=> fake()->numberBetween(1,3),
            "start_date"=>fake()->dateTimeBetween("-2 days","now")->format("Y-m-d"),
            'end_date'=> fake()->dateTimeBetween('now','2 months')->format('Y-m-d'),
        ];
    }
}
