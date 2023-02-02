@extends('layouts.admin')

@section('content')
<h1 class="my-4 fw-bold">{{$type->name}}</h1>
@if(count($type->projects)>0)
    <div class="list-group  mt-3">
        <h4 class="list-group-item fw-bold mb-0">Projects</h4>
        @foreach ($type->projects as $project)
            <a href="{{route('admin.projects.show',$project->slug)}}" class="list-group-item list-group-item-action fs-5">- {{$project->name}}</a>
        @endforeach
    </div>
@else
    <h3>No Projects Associated</h3>
@endif
@endsection