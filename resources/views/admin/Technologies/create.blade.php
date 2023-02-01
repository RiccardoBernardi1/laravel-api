@extends('layouts.admin')

@section('content')
<h1 class="my-4">Create a New Technology</h1>
<form action="{{route('admin.technologies.store')}}" method="POST" >
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Technology Name</label>
        <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" id="name" name="name" value="{{old('name')}}" required>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <button type="reset" class="btn btn-secondary">Reset</button>
</form>
@endsection