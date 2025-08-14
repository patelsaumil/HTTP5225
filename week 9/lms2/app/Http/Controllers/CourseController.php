<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Database\QueryException;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     * Supports simple search: ?q=term and pagination.
     */
    public function index(Request $request)
    {
        $q = trim($request->input('q', ''));

        $courses = Course::query()
            ->when($q !== '', function ($query) use ($q) {
                $query->where('name', 'like', "%{$q}%")
                      ->orWhere('description', 'like', "%{$q}%");
            })
            ->latest('id')
            ->paginate(10)
            ->withQueryString();

        return view('courses.index', compact('courses', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()
            ->route('courses.index')
            ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * Wrapped in try/catch to handle FK constraints (e.g., students/professor).
     */
    public function destroy(Course $course)
    {
        try {
            $course->delete();

            return redirect()
                ->route('courses.index')
                ->with('success', 'Course deleted successfully.');
        } catch (QueryException $e) {
            // Example: 23000 = integrity constraint violation
            return back()->with('error', 'Cannot delete this course because it is referenced by other records.');
        }
    }
}
