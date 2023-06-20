<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProjectSkillFactory extends Factory
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
            'skill_id' => Skill::all()->random()
        ];
    }

}
