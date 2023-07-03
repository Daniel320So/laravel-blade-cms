<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Project;
use App\Models\Skill;

class ProjectsController extends Controller
{

    public function list()
    {
        return view('projects.list', [
            'projects' => Project::all()
        ]);
    }

    public function addForm()
    {
        return view('projects.add', [
            'skills' => Skill::all()
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'committed_hour' => 'required',
            'skills' => 'required'
        ]);

        $project = new Project();
        $project->title = $attributes['skills'];
        $project->description = $attributes['description'];
        $project->status = "Opened";
        $project->start_date = $attributes['start_date'];
        $project->end_date = $attributes['end_date'];
        $project->committed_hour = $attributes['committed_hour'];
        $project->user_id = Auth::user()->id;
        $project->save();
        $project->Skills()->attach($attributes['skills']);

        return redirect('/console/projects/list')
            ->with('message', 'Project has been added!');
    }

    public function editForm(Project $project)
    {
        return view('projects.edit', [
            'project' => $project,
            'allSkills' => Skill::all()
        ]);
    }

    public function edit(Project $project)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'committed_hour' => 'required',
        ]);

        $project->title = $attributes['title'];
        $project->description = $attributes['description'];
        $project->status = $attributes['status'];
        $project->start_date = $attributes['start_date'];
        $project->end_date = $attributes['end_date'];
        $project->committed_hour = $attributes['committed_hour'];
        $project->save();

        return redirect('/console/projects/list')
            ->with('message', 'Project has been edited!');
    }

    public function delete(Project $project)
    {
        if($user->role == 'admin' || $project->user_id == auth()->user()->id) {

        $project->delete();
        
        return redirect('/console/projects/list')
            ->with('message', 'Project has been deleted!');  
        }      
    }
    
}
