<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'name' => fake()->company(),
            'adress' =>fake()->country(),
            'activity' =>Arr::random(['commerce','supply','shippping','services','other']),
            'contact' =>fake()->name(),
            'is_validated' =>fake()->boolean(),
            'user_id' => User::where('role', '=', 'Employee')->get('id')->random(),
            'created_at' =>fake()->dateTimeBetween('-50 days', now()),
        ];
    }
}
