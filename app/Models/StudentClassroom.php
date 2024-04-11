<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function Laravel\Prompts\select;

class StudentClassroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'class_id',
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class,'class_id');
    }

    public function student_profile()
    {
        return $this->belongsTo(StudentProfile::class,'student_id');
    }

    // public static function getStudentProfileClass()
    // {
    //     return StudentClassroom::with(['classroom' => function ($query) {
    //             $query->select('id', 'class_name','teacher_id', 'period', 'grade');
    //             }, 'classroom.teacher.user.profile'])
    //             ->join('classrooms', 'student_classrooms.class_id', '=', 'classrooms.id')
    //             ->orderBy('classrooms.period', 'desc')
    //             ->orderBy('classrooms.class_name', 'asc')
    //             ->get();
    // }


    public static function getSingleStudenProfileClass($id)
    {
        return StudentClassroom::with('classroom:id,class_name', 'student_profile:id,name,gender,status')
            ->whereHas('student_profile', function ($query) use ($id){
                $query->where('id', $id);
            })
            ->first();
    }

    public static function getStudentClassroom($id)
    {
        return StudentClassroom::with('classroom:id,class_name', 'student_profile:id,nis,nisn,name,gender,status')
            ->whereHas('classroom', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->get();
    }

    public static function getClassroom()
    {
        return StudentClassroom::selectRaw('class_id, period, count(*) as student_count')
            ->with(['classroom:id,class_name,grade'])
            ->groupBy('class_id', 'period')
            ->get();
    }

    public static function getLatestClassrooms()
    {
        return StudentClassroom::with(['classroom:id,grade,class_name,period', 'student_profile:id'])
                ->join('classrooms', 'student_classrooms.class_id', '=', 'classrooms.id')
                ->select('student_classrooms.*')
                ->orderBy('classrooms.grade', 'desc')
                ->orderBy('classrooms.period', 'desc')
                ->groupBy('student_classrooms.student_id','student_classrooms.id', 'student_classrooms.id','student_classrooms.class_id','student_classrooms.created_at','student_classrooms.')
                ->get();
    }

}
