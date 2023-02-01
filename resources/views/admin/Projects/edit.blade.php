@extends('layouts.admin')

@section('content')
<h1 class="my-4">Edit Project: {{$project->name}}</h1>
<form action="{{route('admin.projects.update',$project)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Project Name</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" id="name" name="name" value="{{old('name',$project->name)}}" required>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{old('description',$project->description)}}</textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="costumer" class="form-label">Project Title</label>
        <input class="form-control @error('client') is-invalid @enderror" type="text" id="costumer" name="client" value="{{old('client',$project->client)}}" required>
        @error('client')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="cover_image" class="form-label">cover_image</label>
        <input class="form-control @error('cover_image') is-invalid @enderror" type="file" placeholder="cover_image" id="cover_image" name="cover_image" value="{{old('cover_image')}}">
        @error('cover_image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Type</label>
        <select class="form-select" name="type_id" id="type_id">
            <option value="">No Type</option>
            @foreach ($types as $type)
                <option value="{{$type->id}}" {{old('type_id',$project->type?->id)==$type->id ? 'selected' : ""}}>{{$type->name}}</option>
            @endforeach
        </select>
        @error('type_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <div class="mb-2">Technologies</div>
        @foreach ($technologies as $technology)
            @if($errors->any())
                <input type="checkbox" class="form-check-label" name="technologies[]" id="{{$technology->slug}} {{ in_array( $technology->id, old('technologies', [])) ? 'checked' : '' }}" value="{{$technology->id}}">
            @else
                <input type="checkbox" class="form-check-label" name="technologies[]" id="{{$technology->slug}}" {{ $project->technologies->contains($technology->id) ? 'checked' : '' }} value="{{$technology->id}}">
            @endif 
            <label for="{{$technology->slug}}" class="form-check-label me-3">{{$technology->name}}</label>
        @endforeach
        @error('technologies[]')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</form>
@endsection