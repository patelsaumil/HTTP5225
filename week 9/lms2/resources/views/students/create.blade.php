@extends('layouts.admin')

@section('content')
    <h1>Add a Student</h1>

    {{-- Error messages --}}
    @if ($errors->any())
        <div style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 15px;">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form action="{{ route('students.store') }}" method="post">
        @csrf

        <div style="margin-bottom: 10px;">
            <input type="text" name="fname" placeholder="First Name"
                   value="{{ old('fname') }}"
                   style="padding: 8px; width: 300px; border: 1px solid {{ $errors->has('fname') ? 'red' : '#ccc' }};">
        </div>

        <div style="margin-bottom: 10px;">
            <input type="text" name="lname" placeholder="Last Name"
                   value="{{ old('lname') }}"
                   style="padding: 8px; width: 300px; border: 1px solid {{ $errors->has('lname') ? 'red' : '#ccc' }};">
        </div>

        <div style="margin-bottom: 10px;">
            <input type="email" name="email" placeholder="Email"
                   value="{{ old('email') }}"
                   style="padding: 8px; width: 300px; border: 1px solid {{ $errors->has('email') ? 'red' : '#ccc' }};">
        </div>

        <br><br>
               @foreach($courses as $course)
               <input type="checkbox" name="courses[]" value="{{ $course->id }}">
               {{ $course->name }}
               <br>
                @endforeach

        <input type="submit" value="Add"
               style="padding: 8px 20px; background-color: red; color: white; border: none; cursor: pointer;">


                
    </form>
@endsection