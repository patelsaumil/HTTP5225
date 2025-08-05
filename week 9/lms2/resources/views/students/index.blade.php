@extends('admin')
@section('content')
    <h1>All Students</h1>
    @foreach($students as $student)
        {{$student->fname}} {{$student->lname}} - {{$student->email}}<br>
    @endforeach
@endsection
