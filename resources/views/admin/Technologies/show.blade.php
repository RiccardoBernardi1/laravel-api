@extends('layouts.admin')

@section('content')
<h1 class="my-4">{{$technology->name}}</h1>
@if(count($technology->projects)>0)
    <h3>Projects:</h3>
    <ul>
        @foreach ($technology->projects as $project)
            <li>{{$project->name}}</li>
        @endforeach
    </ul>
@else
    <h3>No Projects Associated</h3>
@endif
@endsection