<?php

namespace App\Http\Controllers;

use App\Models\ClassCourse;
use Illuminate\Http\Request;

class ClassCourseController extends Controller
{
    // Get all class courses
    public function index()
    {
        $classCourses = ClassCourse::all();
        return response()->json($classCourses);
    }

    // Get a single class course by ID
    public function show($id)
    {
        $classCourse = ClassCourse::find($id);

        if (!$classCourse) {
            return response()->json(['message' => 'Class Course not found'], 404);
        }

        return response()->json($classCourse);
    }

    // Create a new class course
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string|in:active,inactive',
        ]);

        $classCourse = ClassCourse::create($request->all());

        return response()->json($classCourse, 201);
    }

    // Update an existing class course
    public function update(Request $request, $id)
    {
        $classCourse = ClassCourse::find($id);

        if (!$classCourse) {
            return response()->json(['message' => 'Class Course not found'], 404);
        }

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|string|in:active,inactive',
        ]);

        $classCourse->update($request->all());

        return response()->json($classCourse);
    }

    // Delete a class course
    public function destroy($id)
    {
        $classCourse = ClassCourse::find($id);

        if (!$classCourse) {
            return response()->json(['message' => 'Class Course not found'], 404);
        }

        $classCourse->delete();

        return response()->json(['message' => 'Class Course deleted successfully']);
    }
}

