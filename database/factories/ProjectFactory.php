<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Type;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => 0,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'committed_hour' => $this->faker->randomNumber(2, false),
            'user_id' => User::all()->random()
        ];
    }

}
