@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Projects</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
            <th>Title</th>
            <th>Company Name</th>
            <th>User ID</th>
            <th>Description</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Committed hour</th>
            <th>Skills</th>
            <th>Status</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($projects as $project)
            <tr>
                <td>{{$project->title}}</td>
                <td>{{$project->company_name}}</td>
                <td>{{$project->user_id}}</td>
                <td>{{$project->description}}</td>
                <td>{{$project->start_date}}</td>
                <td>{{$project->end_date}}</td>
                <td>{{$project->committed_hour}}</td>
                <td>
                @foreach ($project->Skills as $skill)
                    {{$skill->title}} <br>
                @endforeach
                </td>
                <td>{{$project->status}}</td>
                <td><a href="/console/projects/edit/{{$project->id}}">Edit</a></td>
                <td><a href="/console/projects/delete/{{$project->id}}">Delete</a></td>
            </tr>
        @endforeach
    </table>

    <a href="/console/projects/add" class="w3-button w3-green">New Project</a>

</section>

@endsection
