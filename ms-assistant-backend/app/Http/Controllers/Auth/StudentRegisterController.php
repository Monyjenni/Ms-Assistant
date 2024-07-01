<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentRegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'phoneNumber' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'universityName' => 'required|string|max:255',
            'faculty' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $student = Student::create([
                'first_name' => $request->input('firstName'),
                'last_name' => $request->input('lastName'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phoneNumber'),
                'password' => Hash::make($request->input('password')),
                'university_name' => $request->input('universityName'),
                'faculty' => $request->input('faculty'),
            ]);

            return response()->json(['student' => $student, 'message' => 'Student registered successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while creating the student.', 'message' => $e->getMessage()], 500);
        }
    }
}
