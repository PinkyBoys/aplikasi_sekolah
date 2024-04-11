<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAssessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
        'assesment_id',
        'score_num',
        'score_let',
        'comment',
        'semester'
    ];

    public function student_profile()
    {
        return $this->belongsTo(StudentProfile::class,'student_id');
    }

    public function assessment()
    {
        return $this->belongsTo(Assessment::class,'assesment_id');
    }

    public static function SingleStudentAssessment($classroom, $id)
    {
        return StudentAssessment::where('class_id' , $classroom)->where('student_id', $id)->get();
    }

}
