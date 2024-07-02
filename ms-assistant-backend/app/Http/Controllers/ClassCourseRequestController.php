<?php

namespace App\Http\Controllers;

use App\Models\ClassCourseRequest;
use Illuminate\Http\Request;

class ClassCourseRequestController extends Controller
{
    // Get all class course requests
    public function index()
    {
        $classCourseRequests = ClassCourseRequest::all();
        return response()->json($classCourseRequests);
    }

    // Get a single class course request by ID
    public function show($id)
    {
        $classCourseRequest = ClassCourseRequest::find($id);

        if (!$classCourseRequest) {
            return response()->json(['message' => 'Class Course Request not found'], 404);
        }

        return response()->json($classCourseRequest);
    }

    // Create a new class course request
    public function store(Request $request)
    {
        $request->validate([
            'class_course_id' => 'required|exists:class_courses,id',
            'student_id' => 'required|exists:students,id',
            'status' => 'required|string|in:pending,approved,rejected',
            'reason' => 'nullable|string',
        ]);

        $classCourseRequest = ClassCourseRequest::create($request->all());

        return response()->json($classCourseRequest, 201);
    }

    // Update an existing class course request
    public function update(Request $request, $id)
    {
        $classCourseRequest = ClassCourseRequest::find($id);

        if (!$classCourseRequest) {
            return response()->json(['message' => 'Class Course Request not found'], 404);
        }

        $request->validate([
            'class_course_id' => 'sometimes|required|exists:class_courses,id',
            'student_id' => 'sometimes|required|exists:students,id',
            'status' => 'sometimes|required|string|in:pending,approved,rejected',
            'reason' => 'nullable|string',
        ]);

        $classCourseRequest->update($request->all());

        return response()->json($classCourseRequest);
    }

    // Delete a class course request
    public function destroy($id)
    {
        $classCourseRequest = ClassCourseRequest::find($id);

        if (!$classCourseRequest) {
            return response()->json(['message' => 'Class Course Request not found'], 404);
        }

        $classCourseRequest->delete();

        return response()->json(['message' => 'Class Course Request deleted successfully']);
    }
}

