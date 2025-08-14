<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use App\Http\Requests\StoreProfessorRequest;
use App\Http\Requests\UpdateProfessorRequest;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(StoreProfessorRequest $request)
    {
        Professor::create($request->validated());
        return redirect()->route('professors.index')->with('success', 'Professor created successfully.');
    }

    public function show(Professor $professor)
    {
        return view('professors.show', compact('professor'));
    }

    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    public function update(UpdateProfessorRequest $request, Professor $professor)
    {
        $professor->update($request->validated());
        return redirect()->route('professors.index')->with('success', 'Professor updated successfully.');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()->route('professors.index')->with('success', 'Professor deleted successfully.');
    }
}