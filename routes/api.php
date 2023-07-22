<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Type;
use App\Models\User;
use App\Models\Project;
use App\Models\Skill;
use App\Models\ProjectSkill;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Get all projects
Route::get('/projects', function(){

    $projects = Project::orderBy('created_at')->get();
    foreach($projects as $key => $project)
    {
        $projectSkills = ProjectSkill::where('project_id', $project->id)->get();
        $skillArray = array();
        if (isSet($projectSkills) && !empty($projectSkills))
        {
            foreach($projectSkills as $key2 => $skillObj)
            {
                $skill = Skill::where('id', $skillObj->skill_id)->first();
                array_push($skillArray, $skill);
            }    
        }

        $projects[$key]['skills'] = $skillArray;
    }

    return $projects;
});