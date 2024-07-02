<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'dob',
        'gender',
        'department_id',
    ];

    protected $casts = [
        'user_id' => 'integer',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function classCourses()
    {
        return $this->hasMany(ClassCourse::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
