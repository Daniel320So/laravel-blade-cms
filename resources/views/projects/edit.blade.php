@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Project</h2>

    <form method="post" action="/console/projects/edit/{{$project->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title', $project->title)}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="company_name">Company Name:</label>
            <input type="text" name="company_name" id="company_name" value="{{old('company_name', $project->company_name)}}" required>
            
            @if ($errors->first('company_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('company_name')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="description">Description:</label>
            <textarea name="description" id="description" required>{{old('description', $project->description)}}</textarea>
            @if ($errors->first('description'))
                <br>
                <span class="w3-text-red">{{$errors->first('description')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{old('start_date', $project->start_date)}}" required>
            
            @if ($errors->first('start_date'))
                <br>
                <span class="w3-text-red">{{$errors->first('start_date')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{old('end_date', $project->end_date)}}" required>
            
            @if ($errors->first('end_date'))
                <br>
                <span class="w3-text-red">{{$errors->first('end_date')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="committed_hour">Committed Hour</label>
            <input type="number" name="committed_hour" id="committed_hour" value="{{$project->committed_hour}}" required>
            
            @if ($errors->first('committed_hour'))
                <br>
                <span class="w3-text-red">{{$errors->first('committed_hour')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="skills[]">Skills:</label><br>
            @foreach ($allSkills as $skill)
                @if ($project->Skills->contains($skill))
                    <input type="checkbox" name="skills[]" value="{{$skill->id}}" checked> {{$skill->title}}<br>
                @else
                    <input type="checkbox" name="skills[]" value="{{$skill->id}}"> {{$skill->title}}<br>
                @endif
                  
            @endforeach
            @if ($errors->first('skills'))
                <br>
                <span class="w3-text-red">{{$errors->first('skills')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="Opened">Opened</option>
                <option value="Closed">Closed</option>
                <option value="Cancelled">Cancelled</option>
            </select>

            @if ($errors->first('status'))
                <br>
                <span class="w3-text-red">{{$errors->first('status')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Project</button>

    </form>

    @if (auth()->user()->role = "member") 
        <a href="/console/recruiters">Back to Project List</a>
    @else
        <a href="/console/projects/list">Back to Project List</a>
    @endif


</section>

@endsection
