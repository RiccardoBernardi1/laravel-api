@extends('layouts.admin')

@section('content')
<h1 class="my-4">{{$project->name}}</h1>
@if($project->type?->name)
    <h3>Type: <a href="{{route('admin.types.show',$project->type->slug)}}" class="badge bg-primary text-decoration-none text-light">{{$project->type->name}}</a></h3>
@else
    <h3>No Type Associated</h3>
@endif
@if($project->technologies->isNotEmpty())
    <h4 class="my-4">
        Technologies:
        @foreach ($project->technologies as $technology)
            <a href="{{route('admin.types.show',$technology->slug)}}" class="badge bg-secondary text-decoration-none text-light">{{$technology->name}}</a>
        @endforeach
    </h4>
@else
    <h4>No Technology</h4>
@endif
@if($project->cover_image)
    <img src="{{asset("storage/$project->cover_image")}}" alt="{{$project->name}}" class="w-50">
@endif
<h4 class="mt-4">Description:</h4>
<p>{{$project->description}}</p>
<h4 class="mt-4 d-inline">Costumer:</h4>
<span>{{$project->client}}</span>
<div class="mt-4">
    <a href="{{route('admin.projects.edit',$project->slug)}}" class="btn btn-warning me-3">Edit</a>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$project->id}}">Delete</button>
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