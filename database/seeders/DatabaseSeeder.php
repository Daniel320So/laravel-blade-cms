<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\Entry;
use App\Models\Skill;
use App\Models\ProjectSkill;
use App\Models\Application;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Type::truncate();
        Project::truncate();
        Entry::truncate();
        Skill::truncate();
        ProjectSkill::truncate();
        Application::truncate();
        
        User::factory()->count(2)->create();
        Type::factory()->count(3)->create();
        Project::factory()->count(4)->create();
        Entry::factory()->count(4)->create();
        Skill::factory()->count(4)->create();
        ProjectSkill::factory()->count(4)->create();
        Application::factory()->count(4)->create();
            
    }
}
