<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGuardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'father_name',
        'mother_name',
        'father_highest_education',
        'mother_highest_education',
        'father_occupation',
        'mother_occupation',
        'student_guardian',
        'relationship',
        'guardian_highest_education',
        'guardian_occupation',
    ];

    public function student_profile()
    {
        return $this->belongsTo(StudentProfile::class, 'student_id');
    }

}
