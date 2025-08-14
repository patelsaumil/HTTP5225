@extends('admin')
    @section('content')
        <h1>All Students</h1>
        @foreach ($students as $student)
        {{ $student -> fname}} 
        {{ $student -> lname}} 
        {{ $student -> email}} 
        <a href="{{ route('students.edit', $student -> id ) }}" >Edit</a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST">
            {{ csrf_field() }}
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        <br>
        @endforeach
    @endsection