<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Vacation;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\Cast\Array_;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leave>
 */
class LeaveFactory extends Factory
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
            'user_id' => User::where('role', '<>', 'Admin')->get('id')->random(),
            'start_date' =>fake()->dateTimeBetween('2 days', now()),
            'end_date' =>fake()->dateTimeBetween(now(), '20 days'),
            'requested_days' =>fake()->dateTimeBetween('start_date', 'end_date'),
        ];
    }
}
