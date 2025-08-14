<?php
// app/Models/Course.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function students(): BelongsToMany
    {
        // pivot table: course_student (default), keys: course_id, student_id
        return $this->belongsToMany(Student::class)->withTimestamps();
    }
}