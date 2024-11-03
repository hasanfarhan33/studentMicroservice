<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentExam extends Model
{
    use HasFactory; 

    protected $table = 'student_exam'; 

    protected $fillable = [
        'examId', 
        'studentId', 
        'result'
    ]; 

    public $timestamps = false; 

    // Defining relationships 
    public function exam() {
        return $this->belongsTo(Exam::class, 'exam_id'); 
    }

    public function student() {
        return $this->belongsTo(Student::class, 'studentId'); 
    }
}
