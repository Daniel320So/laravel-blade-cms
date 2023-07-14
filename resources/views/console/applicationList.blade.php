@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Applications - {{$project->title}}</h2>
    
    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Project ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Linkedin</th>
            <th>Website</th>
        </tr>
        @foreach ($applications as $application)
            <tr>
                <td>{{$application->project_id}}</td>
                <td>{{$application->name}}</td>
                <td>{{$application->email}}</td>
                <td>{{$application->phone}}</td>
                <td>{{$application->linkedin}}</td>
                <td>{{$application->website}}</td>
            </tr>
        @endforeach
    </table>


</section>

@endsection
