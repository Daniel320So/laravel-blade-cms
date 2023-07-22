@extends ('layout.console')

@section ('content')

<section class="w3-padding">

    <h2>Manage Projects</h2>

    <table class="w3-table w3-stripped w3-bordered w3-margin-bottom">
        <tr class="w3-red">
        <th>Title</th>
            <th>Company Name</th>
            <th>Date</th>
            <th>Skills</th>
            <th>Status</th>
            <th>Number of Applicants</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($projects as $project)
            @if($project->user_id == auth()->user()->id)
                <tr>
                <td>{{$project->title}}</td>
                <td>{{$project->company_name}}</td>
                <td>{{$project->start_date}} - {{$project->end_date}}</td>
                <td>
                @foreach ($project->Skills as $skill)
                    {{$skill->title}} <br>
                @endforeach
                </td>
                <td>{{$project->status}}</td>
                <td>{{Count($project->applications)}}</td>
                <td><a href="/console/applicationList/{{$project->id}}">View Applicants</a></td>
                <td><a href="/console/projects/edit/{{$project->id}}">Edit</a></td>
                </tr>
            @endif
        @endforeach
    </table>

    <a href="/console/projects/add" class="w3-button w3-green">New Project</a>

</section>

@endsection
