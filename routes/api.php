<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentExamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// GET ALL STUDENTS 
Route::get('/students', [StudentController::class, 'getAllStudents']); 

// GET ONE STUDENT 
Route::get('/students/{id}', [StudentController::class, 'getOneStudent']); 

// ADD A STUDENT 
Route::post('/students', [StudentController::class, 'addAStudent']); 

// DELETE A STUDENT 
Route::delete('/students/{id}', [StudentController::class, 'deleteAStudent']);

// UPDATE A STUDENT
Route::put('/students/{id}', [StudentController::class, 'updateAStudent']); 



// * ROUTES FOR STUDENT EXAM TABLE 
Route::get("/studentexams", [StudentExamController::class, 'getAllStudentExams']); 
Route::get("/studentexams/{id}", [StudentExamController::class, 'getOneStudentExam']); 
Route::post("/studentexams", [StudentExamController::class, 'addAStudentExam']); 
Route::delete("/studentexams/{id}", [StudentExamController::class, 'deleteAStudentExam']); 
Route::put("/studentexams/{id}", [StudentExamController::class, 'updateAStudentExam']); 
