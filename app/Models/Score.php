<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'max',
        'letter',
    ];

    public static function getAllScore()
    {
        return Score::get();
    }

    public static function getSingleScore($id)
    {
        return Score::where('id', $id)->first();
    }

    public static function gradeStandard($num)
    {
        return Score::where('number', '<=', $num)->orderBy('number', 'desc')->first();
    }
}
