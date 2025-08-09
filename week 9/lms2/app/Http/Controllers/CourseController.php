<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    // LIST
    public function index()
    {
        return view('courses.index', [
            'courses' => Course::all(),
        ]);
    }

    // CREATE FORM
    public function create()
    {
        return view('courses.create');
    }

    // STORE
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Course::create($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created.');
    }

    // SHOW
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    // EDIT FORM
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }


    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $course->update($data);

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated.');
    }


    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course deleted.');
    }
}
