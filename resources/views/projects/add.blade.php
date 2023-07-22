@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Add Project</h2>

    <form method="post" action="/console/projects/add" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{old('title')}}" required>
            
            @if ($errors->first('title'))
                <br>
                <span class="w3-text-red">{{$errors->first('title')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="company_name">Company Name:</label>
            <input type="text" name="company_name" id="company_name" value="{{old('company_name')}}" required>
            
            @if ($errors->first('company_name'))
                <br>
                <span class="w3-text-red">{{$errors->first('company_name')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="description">Description:</label>
            <textarea name="description" id="description" value="{{old('description')}}" required></textarea>
            
            @if ($errors->first('description'))
                <br>
                <span class="w3-text-red">{{$errors->first('description')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date" value="{{old('start_date')}}" required>
            
            @if ($errors->first('start_date'))
                <br>
                <span class="w3-text-red">{{$errors->first('start_date')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="end_date">End Date:</label>
            <input type="date" name="end_date" id="end_date" value="{{old('end_date')}}" required>
            
            @if ($errors->first('end_date'))
                <br>
                <span class="w3-text-red">{{$errors->first('end_date')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="committed_hour">Committed Hours:</label>
            <input type="number" name="committed_hour" id="committed_hour" value="{{old('committed_hour')}}" required>
            
            @if ($errors->first('committed_hour'))
                <br>
                <span class="w3-text-red">{{$errors->first('committed_hour')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="skills[]">Skills:</label><br>
            @foreach ($skills as $skill)
                <input type="checkbox" name="skills[]" value="{{$skill->id}}"> {{$skill->title}}<br>  
            @endforeach
            @if ($errors->first('skills'))
                <br>
                <span class="w3-text-red">{{$errors->first('skills')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Add Project</button>

    </form>

    <a href="/console/projects/list">Back to Project List</a>

</section>

@endsection