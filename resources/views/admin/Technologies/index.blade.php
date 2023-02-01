@extends('layouts.admin')

@section('content')
@if (session('message'))
    <div class="alert alert-success">
        {{ session('message')}}
    </div>
@endif
<h1 class="my-4">Technologies List</h1>
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Details</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($technologies as $technology)
            <tr>
                <th scope="row">{{$technology->id}}</th>
                <td>{{$technology->name}}</td>
                <td>{{$technology->slug}}</td>
                <td>
                    <a href="{{route('admin.technologies.show',$technology->slug)}}" class="btn btn-primary">Details</a>
                </td>
                <td>
                    <a href="{{route('admin.technologies.edit',$technology->slug)}}" class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal{{$technology->id}}">Delete</button>
                </td>
            </tr>
            <div class="modal fade" id="modal{{$technology->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
                            <button technology="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete {{$technology->name}}?
                        </div>
                        <div class="modal-footer">
                            <form action="{{route('admin.technologies.destroy',$technology)}}"    method="POST">
                                @csrf
                                @method('DELETE')
                                <button technology="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button technology="submit" class="btn btn-primary">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </tbody>
</table>
<a href="{{route('admin.technologies.create')}}" class="btn btn-success">Create a New Technology</a>
@endsection