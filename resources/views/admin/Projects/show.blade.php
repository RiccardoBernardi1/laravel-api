@extends('layouts.admin')

@section('content')
<h1 class="my-4 fw-bold">{{$project->name}}</h1>
@if($project->type?->name)
    <h2 class="d-inline">Type : <a href="{{route('admin.types.show',$project->type->slug)}}" class="badge bg-primary text-decoration-none text-light ms-2 me-4">{{$project->type->name}}</a></h2>
@else
    <h2>No Type Associated</h2>
@endif
@if($project->technologies->isNotEmpty())
    <h3 class="my-4 d-inline">
        Technologies :
        @foreach ($project->technologies as $technology)
            <a href="{{route('admin.technologies.show',$technology->slug)}}" class="badge bg-secondary text-decoration-none text-light ms-2"">{{$technology->name}}</a>
        @endforeach
    </h3>
@else
    <h3>No Technology</h3>
@endif
@if($project->cover_image)
    <img src="{{asset("storage/$project->cover_image")}}" alt="{{$project->name}}" class="w-50 mt-4 ">
@endif
<h4 class="mt-4 ">Description:</h4>
<p >{{$project->description}}</p>
<h4 class="mt-4 d-inline">Costumer : </h4>
<span>{{$project->client}}</span>
<div class="mt-4">
    <a href="{{route('admin.projects.edit',$project->slug)}}" class="btn btn-warning me-2 fw-bold">Edit</a>
    <button class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#modal{{$project->id}}">Delete</button>
</div>


<div class="modal fade" id="modal{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete {{$project->name}}?
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.projects.destroy',$project)}}"    method="POST">
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