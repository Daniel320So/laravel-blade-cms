<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()

    {
        return [
            'project_id' => Project::all()->random(),
            'name' => $this->faker->sentence,
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->randomNumber(8, true),
            'linkedin' => $this->faker->url('http'),
            'website' => $this->faker->url('http'),
        ];
    }

}
