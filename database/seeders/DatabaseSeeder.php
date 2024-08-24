<?php

namespace Database\Seeders;

use App\Models\Bundle;
use App\Models\Member;
use App\Models\Membership;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'samer',
            'email' => 'samer@live.com',
        ]);

        // Member::factory(10)->create();

        Bundle::factory()->create([
            'name' => 'day',
            'price' => '5$',
            'duration' => '1 day',
        ]);

        Bundle::factory()->create([
            'name' => 'week',
            'price' => '15$',
            'duration' => '7 days',
        ]);

        Bundle::factory()->create([
            'name' => 'month',
            'price' => '25$',
            'duration' => '31 day',
        ]);

        Membership::factory(100)->create();

    }
}
