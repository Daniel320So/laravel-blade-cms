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
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" id="user_id" value="{{old('user_id', $project->user_id)}}" required>
            
            @if ($errors->first('user_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('user_id')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="description">Description:</label>
            <input type="text" name="description" id="description" value="{{old('description', $project->description)}}" required>
            
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
            <label for="status">Status:</label>
            <input type="text" name="status" id="status" value="{{old('status', $project->status)}}" required>
            
            @if ($errors->first('status'))
                <br>
                <span class="w3-text-red">{{$errors->first('status')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Project</button>

    </form>

    <a href="/console/projects/list">Back to Project List</a>

</section>

@endsection
