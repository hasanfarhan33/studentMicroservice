<?php

namespace App\Http\Controllers;

use App\Models\StudentExam;
use Illuminate\Http\Request;

class StudentExamController extends Controller
{
    //GET ALL STUDENT EXAMS 
    public function getAllStudentExams() {
        $studentExams = StudentExam::all(); 

        return response()->json($studentExams); 
    }

    public function getOneStudentExam($id) {
        $studentExam = StudentExam::find($id); 

        if(!$studentExam) return response()->json(["Message" => "Could not find student exam"], 404); 

        return response()->json($studentExam); 
    }

    public function addAStudentExam(Request $request) {
        $studentExam = StudentExam::create([
            'studentId' => $request->input('studentId'), 
            'examId' => $request->input('examId'), 
            'result' => $request->input('result')
        ]); 

        return response()->json(["Message" => "Student Exam added successfully", $studentExam], 201); 
    }

    public function deleteAStudentExam($id) {
        $studentExam = StudentExam::find($id); 

        if(!$studentExam) return response()->json(["Message" => "Could not find student exam"], 404); 

        $studentExam->delete(); 

        return response()->json(["Message" => "Deleted student exam"], 201); 
    }

    public function updateAStudentExam(Request $request, $id) {
        $studentExam = StudentExam::find($id); 

        if(!$studentExam) return response()->json(["Message" => "Could not find student exam"], 404); 

        $studentExam->update($request->only(['studentId', 'examId', 'result'])); 

        return response()->json($studentExam); 
    }
    
}
