<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Project;
use App\Models\Type;
use App\Models\Entry;

class EntriesController extends Controller
{
    public function list()
    {
        return view('entries.list', [
            'entries' => Entry::all()
        ]);
    }

    public function addForm()
    {
        return view('entries.add', [
            'types' => Type::all(),
        ]);
    }
    
    public function add()
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'learned_at' => 'required',
        ]);

        $entries = new Entry();
        $entries->title = $attributes['title'];
        $entries->content = $attributes['content'];
        $entries->learned_at = $attributes['learned_at'];
        $entries->save();

        return redirect('/console/entries/list')
            ->with('message', 'Entry has been added!');
    }

    public function editForm(Entry $entry)
    {
        return view('entries.edit', [
            'entry' => $entry,
            'types' => Type::all(),
        ]);
    }

    public function edit(Entry $entry)
    {

        $attributes = request()->validate([
            'title' => 'required',
            'content' => 'required',
            'learned_at' => 'required',
        ]);

        $entry->title = $attributes['title'];
        $entry->content = $attributes['content'];
        $entry->learned_at = $attributes['learned_at'];
        $entry->save();

        return redirect('/console/entries/list')
            ->with('message', 'Entry has been edited!');
    }

    public function delete(Entry $entry)
    {

        $entry->delete();
        
        return redirect('/console/entries/list')
            ->with('message', 'Entry has been deleted!');        
    }

}
