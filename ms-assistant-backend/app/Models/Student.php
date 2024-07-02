<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'university_name',
        'faculty',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relationships
    public function classCourses()
    {
        return $this->belongsToMany(ClassCourse::class, 'class_course_student');
    }

    public function classCourseRequests()
    {
        return $this->hasMany(ClassCourseRequest::class);
    }
}
