@extends('layouts.admin')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-primary fw-bold"> All Courses</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-success shadow-sm">
            + Add New Course
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if($courses->count())
        <div class="row">
            @foreach($courses as $course)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title text-primary">{{ $course->name }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($course->description, 80) }}</p>
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('courses.show', $course->id) }}" class="btn btn-info btn-sm text-white">View</a>
                                <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Delete this course?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer text-muted small">
                            Created: {{ $course->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">No courses found. Click "Add New Course" to create one.</div>
    @endif

</div>
@endsection
