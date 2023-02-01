@extends('layouts.admin')

@section('content')
<h1 class="my-4">Edit: {{$tecnology->name}}</h1>
<form action="{{route('admin.technologies.update',$tecnology)}}" method="POST" >
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Tecnology Name</label>
        <input class="form-control @error('name') is-invalid @enderror" tecnology="text" placeholder="Name" id="name" name="name" value="{{old('name',$tecnology->name)}}" required>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button tecnology="submit" class="btn btn-success">Submit</button>
    <button tecnology="reset" class="btn btn-secondary">Reset</button>
</form>
@endsection