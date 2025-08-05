@extends('layouts.admin')

@section('content')
<h1>Edit Student</h1>

<form method="POST" action="{{ route('students.update', $student->id) }}">
    @csrf
    @method('PUT')
    <input type="text" name="fname" value="{{ $student->fname }}" placeholder="First Name">
    <input type="text" name="lname" value="{{ $student->lname }}" placeholder="Last Name">
    <input type="email" name="email" value="{{ $student->email }}" placeholder="Email">
    <button type="submit">Update</button>
</form>
@endsection
