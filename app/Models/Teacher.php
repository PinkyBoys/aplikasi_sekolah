<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'is_homeroom',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'teacher_id');
    }

    public static function getSingleTeacher($id)
    {
        return Teacher::with('user:id,role')
            ->whereHas('user', function ($query) {
                $query->where('role', 'guru');
            })
            ->where('id', $id)
            ->first();
    }

    public static function teacherList()
    {
        return Teacher::with(['user:id,username,role', 'user.profile:user_id,name,address,phone'])
            ->get();
    }

    public static function homeroom()
    {

        return Teacher::with(['user:id,id,role', 'user.profile:user_id,name'])->where('is_homeroom', true)->get();
    }
}
