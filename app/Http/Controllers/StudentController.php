<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //GET ALL STUDENTS 
    public function getAllStudents() {
        $students = Student::all(); 

        return response()->json($students); 
    }

    // GET ONE STUDENT 
    public function getOneStudent($id) {
        $student = Student::find($id); 

        if(!$student) return response()->json(["Message" => "Could not find student"], 404); 

        return response()->json($student); 
    }

    // ADD A STUDENT 
    public function addAStudent(Request $request) {
        $student = Student::create([
            'firstName' => $request->input('firstName'), 
            'lastName' => $request->input('lastName'), 
            'studentId' => $request->input('studentId'), 
            'email' => $request->input('email'), 
            'password' => $request->input('password') 
        ]); 

        return response()->json(["Message" => "The student has been added", $student], 201); 
    }

    // DELETE A STUDENT 
    public function deleteAStudent($id) {
        $student = Student::find($id); 
        
        if(!$student) return response()->json(["Message" => "Student does not exist. Cannot DELETE."], 404); 

        $student->delete(); 

        return response()->json(['Message' => "Student deleted successfully!"], 201); 
    }

    // UPDATE A STUDENT 
    public function updateAStudent(Request $request, $id) {
        $student = Student::find($id); 

        if(!$student) return response()->json(["Message" => "Could not find student. Cannot UPDATE"], 404); 

        $student->update($request->only(['firstName', 'lastName', 'studentId', 'email', 'password'])) ;

        return response()->json($student); 
    }
}
