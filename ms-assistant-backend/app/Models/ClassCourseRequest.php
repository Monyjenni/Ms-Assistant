<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\ClassCourse;

class ClassCourseRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_course_id',
        'student_id',
        'status',
        'reason',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function classCourse()
    {
        return $this->belongsTo(ClassCourse::class);
    }
}

