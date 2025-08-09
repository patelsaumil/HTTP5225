@extends('layouts.admin')

@section('content')
    <h1 class="mb-4">Course Details</h1>

    <div class="card p-3">
        <h3>{{ $course->name }}</h3>
        <p>{{ $course->description }}</p>

        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>
@endsection
