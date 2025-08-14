{{-- resources/views/students/edit.blade.php --}}
@extends('layouts.admin')
@section('title','Edit Student')

@section('content')
<a href="{{ route('students.index') }}" class="btn btn-link mb-3">&larr; Back</a>

<div class="card">
  <div class="card-body">
    <h2 class="h4 mb-3">Edit Student</h2>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Please fix the following:</strong>
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST" novalidate>
      @csrf
      @method('PUT')

      <div class="row g-3">
        <div class="col-md-4">
          <label class="form-label" for="fname">First Name</label>
          <input id="fname" name="fname" type="text"
                 class="form-control @error('fname') is-invalid @enderror"
                 value="{{ old('fname', $student->fname) }}" required>
          @error('fname') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
          <label class="form-label" for="lname">Last Name</label>
          <input id="lname" name="lname" type="text"
                 class="form-control @error('lname') is-invalid @enderror"
                 value="{{ old('lname', $student->lname) }}" required>
          @error('lname') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="col-md-4">
          <label class="form-label" for="email">Email</label>
          <input id="email" name="email" type="email"
                 class="form-control @error('email') is-invalid @enderror"
                 value="{{ old('email', $student->email) }}" required>
          @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      <hr class="my-4">

      {{-- Courses (many-to-many) --}}
      <div class="mb-2">
        <label class="form-label d-block">Select Courses</label>

        @php
          // Controller should pass: $selected = $student->courses()->pluck('courses.id')->toArray();
          $selectedIds = (array) old('courses', $selected ?? []);
        @endphp

        @if(isset($courses) && $courses->count())
          @foreach($courses as $course)
            <div class="form-check">
              <input class="form-check-input" type="checkbox"
                     id="course_{{ $course->id }}"
                     name="courses[]"
                     value="{{ $course->id }}"
                     {{ in_array($course->id, $selectedIds, true) ? 'checked' : '' }}>
              <label class="form-check-label" for="course_{{ $course->id }}">
                {{ $course->name }}
              </label>
            </div>
          @endforeach
        @else
          <div class="alert alert-info mb-0">
            No courses available. <a href="{{ route('courses.create') }}">Create one</a>.
          </div>
        @endif

        @error('courses') <div class="text-danger small mt-2">{{ $message }}</div> @enderror
        @error('courses.*') <div class="text-danger small">{{ $message }}</div> @enderror
      </div>

      <div class="mt-4">
        <button class="btn btn-primary">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
@endsection