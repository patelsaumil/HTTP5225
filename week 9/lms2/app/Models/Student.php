<?php
// app/Models/Student.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['fname', 'lname', 'email'];

    public function courses(): BelongsToMany
    {
        // pivot table: course_student (default), keys: student_id, course_id
        return $this->belongsToMany(Course::class)->withTimestamps();
    }
}