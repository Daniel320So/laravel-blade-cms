<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Skill;

class SkillsController extends Controller
{

    public function list()
    {
        return view('Skills.list', [
            'Skills' => Skill::all()
        ]);
    }

    public function addForm()
    {

        return view('Skills.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $skill = new Skill();
        $skill->title = $attributes['title'];
        $skill->description = $attributes['description'];
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been added!');
    }

    public function editForm(Skill $skill)
    {
        return view('Skills.edit', [
            'skill' => $skill
        ]);
    }

    public function edit(Skill $skill)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $skill->title = $attributes['title'];
        $skill->description = $attributes['description'];
        $skill->save();

        return redirect('/console/skills/list')
            ->with('message', 'Skill has been edited!');
    }

    public function delete(Skill $skill)
    {
        if(auth()->user()->role == 'admin') {
            $skill->delete();
        
            return redirect('/console/skills/list')
                ->with('message', 'Skill has been deleted!'); 
        }
       
    }

}
