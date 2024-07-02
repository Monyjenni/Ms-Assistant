<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\ClassCourseRequest;

class ClassCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'class_course_student');
    }

    public function classCourseRequests()
    {
        return $this->hasMany(ClassCourseRequest::class);
    }
}

