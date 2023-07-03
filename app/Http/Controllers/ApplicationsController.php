<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Application;

class ApplicationsController extends Controller
{

    public function list()
    {
        return view('applications.list', [
            'applications' => Application::all()
        ]);
    }

    public function addForm(Application $application)
    {
        return view('applications.add');
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'project_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'nullable',
            'resume' => 'nullable',
            'cover_letter' => 'nullable',
        ]);

        

        $application = new Application();
        $application->project_id = $attributes['project_id'];
        $application->name = $attributes['name'];
        $application->email = $attributes['email'];
        $application->phone = $attributes['phone'];
        $application->website = $attributes['website'];
        $application->resume = $attributes['resume'];
        $application->cover_letter = $attributes['cover_letter'];
        $application->save();

        return redirect('/console/applications/list')
            ->with('message', 'Application has been added!');
    }

    public function editForm(Application $application)
    {
        return view('applications.edit', [
            'application' => $application,
        ]);
    }

    public function edit(Application $application)
    {

        $attributes = request()->validate([
            'project_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'website' => 'nullable',
            'resume' => 'nullable',
            'cover_letter' => 'nullable',
        ]);

        $application->project_id = $attributes['project_id'];
        $application->name = $attributes['name'];
        $application->email = $attributes['email'];
        $application->phone = $attributes['phone'];
        $application->website = $attributes['website'];
        $application->resume = $attributes['resume'];
        $application->cover_letter = $attributes['cover_letter'];
        $application->save();

        return redirect('/console/applications/list')
            ->with('message', 'Application has been edited!');
    }

    public function delete(Application $application)
    {

        if($application->image)
        {
            Storage::delete($application->image);
        }
        
        $application->delete();
        
        return redirect('/console/applications/list')
            ->with('message', 'Application has been deleted!');        
    }

    public function imageForm(Application $application)
    {
        return view('applications.image', [
            'application' => $application,
        ]);
    }
    
}
