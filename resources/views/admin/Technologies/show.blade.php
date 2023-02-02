@extends('layouts.admin')

@section('content')
<h1 class="my-4">{{$technology->name}}</h1>
@if(($technology->projects->isNotEmpty()))
    <h3>Projects:</h3>
    <ul>
        @foreach ($technology->projects as $project)
            <li>
                <a href="{{route('admin.projects.show',$project->slug)}}">{{$project->name}}</a>
            </li>
        @endforeach
    </ul>
@else
    <h3>No Projects Associated</h3>
@endif
@endsection