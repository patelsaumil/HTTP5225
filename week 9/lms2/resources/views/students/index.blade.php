@extends('layouts.admin')

@section('content')
<h1>All Students</h1>

<a href="{{ route('students.create') }}"> Create New Student</a>
<br><br>


@foreach($students as $student)
    {{ $student->fname }} {{ $student->lname }} - {{ $student->email }}
    <a href="{{ route('students.edit', $student->id) }}">Edit</a>
    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <br>
@endforeach
@endsection
