<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div>
        <ul>
            <li><a href="">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('students.index') }}">Students</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('courses.index') }}">Courses</a></li>
        </ul>
    </div>
    <hr>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>