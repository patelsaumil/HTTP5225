@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Edit Course</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $course->name) }}">
        </div>

        <div class="mb-3">
            <label>Description:</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
