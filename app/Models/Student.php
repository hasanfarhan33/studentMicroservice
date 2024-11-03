<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory; 

    protected $connection = 'student_service_db'; 
    protected $table = "students"; 

    protected $fillable = [
        'firstName', 
        'lastName', 
        'studentId', 
        'email', 
        'password'
    ]; 

    public $timestamps = false; 
}
