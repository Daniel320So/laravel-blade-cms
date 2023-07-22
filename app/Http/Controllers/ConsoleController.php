<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Project;
use App\Models\Application;

class ConsoleController extends Controller
{
    
    public function logout()
    {
        auth()->logout();
        return redirect('/console/login');
    }

    public function loginForm()
    {
        return view('console.login');
    }

    public function login()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($attributes))
        {
            if(auth()->user()->role == "admin")
            {
                return redirect('/console/dashboard');
            }
            else
            {
                return redirect('/console/recruiters');
            }
            
        }
        
        return back()
            ->withInput()
            ->withErrors(['email' => 'Invalid email/password combination']);
    }

    public function dashboard()
    {
        return view('console.dashboard');
    }

    public function recruiters()
    {
        return view('console.recruiters', [
            'projects' => Project::all()
        ]);
    }

    
    public function applicationList(Project $project)
    {
        return view('console.applicationList', [
            'project' => $project,
            'applications' => Application::where('project_id', $project->id)->get()
        ]);
    }


}
