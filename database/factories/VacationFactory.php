<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacation>
 */
class VacationFactory extends Factory
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
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'balance'=>Arr::random([10,15,20]),
        ];
    }
}
