@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Edit Application</h2>

    <form method="post" action="/console/applications/edit/{{$application->id}}" novalidate class="w3-margin-bottom">

        @csrf

        <div class="w3-margin-bottom">
            <label for="project_id">Project ID:</label>
            <input type="text" name="project_id" id="project_id" value="{{old('project_id', $application->project_id)}}" required>
            
            @if ($errors->first('project_id'))
                <br>
                <span class="w3-text-red">{{$errors->first('project_id')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="name">Name::</label>
            <input type="text" name="name" id="name" value="{{old('name', $application->name)}}" required>
            
            @if ($errors->first('name'))
                <br>
                <span class="w3-text-red">{{$errors->first('name')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{{old('email', $application->email)}}" required>
            
            @if ($errors->first('email'))
                <br>
                <span class="w3-text-red">{{$errors->first('email')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="phone">Phone Number:</label>
            <input type="text" name="phone" id="phone" value="{{old('phone', $application->phone)}}" required>
            
            @if ($errors->first('phone'))
                <br>
                <span class="w3-text-red">{{$errors->first('phone')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="linkedin">Linkedin:</label>
            <input type="text" name="linkedin" id="linkedin" value="{{old('linkedin', $application->linkedin)}}" required>
            
            @if ($errors->first('linkedin'))
                <br>
                <span class="w3-text-red">{{$errors->first('linkedin')}}</span>
            @endif
        </div>

        <div class="w3-margin-bottom">
            <label for="website">Website:</label>
            <input type="text" name="website" id="website" value="{{old('website', $application->website)}}" required>
            
            @if ($errors->first('website'))
                <br>
                <span class="w3-text-red">{{$errors->first('website')}}</span>
            @endif
        </div>

        <button type="submit" class="w3-button w3-green">Edit Application</button>

    </form>

    <a href="/console/applications/list">Back to Application List</a>

</section>

@endsection
