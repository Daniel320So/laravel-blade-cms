@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Applications</h2>
    
    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Project ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Linkedin</th>
            <th>Website</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($applications as $application)
            <tr>
                <td>{{$application->project_id}}</td>
                <td>{{$application->name}}</td>
                <td>{{$application->email}}</td>
                <td>{{$application->phone}}</td>
                <td>{{$application->linkedin}}</td>
                <td>{{$application->website}}</td>
                <td><a href="/console/applications/edit/{{$application->id}}">Edit</a></td>
                <td><a href="/console/applications/delete/{{$application->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/applications/add" class="w3-button w3-green">New Application</a>

</section>

@endsection
