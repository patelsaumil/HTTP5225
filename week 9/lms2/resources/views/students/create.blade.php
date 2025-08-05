@extends('admin');
@section('content')
    <h1>Add a Students</h1>
   <form action="{{ route('students.store') }}" method="post">
    {{ csrf_field() }}
    <input type="text" name="fname" placeholder="First Name">
    <input type="text" name="lname" placeholder="Larst Name">
    <input type="email" name="email" placeholder="Email">
    <input type="submit" name="Add">
</form>
@endsection