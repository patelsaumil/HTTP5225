<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // eager-load courses so you can show them in the table without N+1
        $students = Student::with('courses')->latest('id')->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * Provides all courses for the multiselect.
     */
    public function create()
    {
        $courses = Course::orderBy('name')->get();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     * Uses validated() from your Form Request and syncs pivot rows.
     */
    public function store(StoreStudentRequest $request)
    {
        // create the student from validated base fields
        $student = Student::create($request->safe()->except('course_ids'));

        // attach selected courses (if any)
        $student->courses()->sync($request->validated('course_ids') ?? []);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     * Provides all courses + the student’s current selections.
     */
    public function edit(Student $student)
    {
        $courses = Course::orderBy('name')->get();
        $student->load('courses');
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     * Updates student fields and re-syncs selected courses.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->safe()->except('course_ids'));
        $student->courses()->sync($request->validated('course_ids') ?? []);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()
            ->route('students.index')
            ->with('success', 'Student deleted successfully.');
    }
}
