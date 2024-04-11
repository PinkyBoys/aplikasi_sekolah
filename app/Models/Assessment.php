<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'minimum',
        'status'
    ];

    public function student_assessment()
    {
        return $this->hasMany(StudentAssessment::class,'assessment_id');
    }

    public static function getAllAssessment()
    {
        return Assessment::get();
    }

    public static function getSingleAssessment($id)
    {
        return Assessment::where('id', $id)->first();
    }

    public static function getAllActiveAssessment()
    {
        return Assessment::where('status', true)->get();
    }

    public static function getAssessmentUmum()
    {
        return Assessment::where('status', true)->where('type', 'umum')->get();
    }

    public static function getAssessmentMulok()
    {
        return Assessment::where('status', true)->where('type', 'mulok')->get();
    }

    public static function getAssessmentSpiritual()
    {
        return Assessment::where('status', true)->where('type', 'spiritual')->get();
    }

    public static function getAssessmentEkskul()
    {
        return Assessment::where('status', true)->where('type', 'ekskul')->get();
    }
}
