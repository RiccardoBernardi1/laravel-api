@extends('layouts.admin')

@section('content')
<h1 class="my-4 fw-bold">{{$technology->name}}</h1>
@if(($technology->projects->isNotEmpty()))
    <div class="list-group  mt-3">
        <h4 class="list-group-item fw-bold mb-0">Projects</h4>
        @foreach ($technology->projects as $project)
            <a href="{{route('admin.projects.show',$project->slug)}}" class="list-group-item list-group-item-action fs-5">- {{$project->name}}</a>
        @endforeach
    </div>
@else
    <h3>No Projects Associated</h3>
@endif
<div class="mt-4">
    <a href="{{route('admin.technologies.edit',$technology->slug)}}" class="btn btn-warning me-2 fw-bold">Edit</a>
    <button class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#modal{{$technology->id}}">Delete</button>
</div>
<div class="modal fade" id="modal{{$technology->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete {{$technology->name}}?
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.technologies.destroy',$technology)}}"    method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection