<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Classroom;
use App\Models\StudentClassroom;
use App\Models\StudentProfile;
use Illuminate\Http\Request;

class StudentClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = StudentClassroom::getClassroom();
        // dd($classrooms);

        return view('pages.class.student_classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->input());
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $students = StudentClassroom::getStudentClassroom($id);
        $classroom = Classroom::getSingleClass($id);

        if(!$classroom){
            return abort(404);
        }

        return view('pages.class.student_classroom.view',compact('students', 'classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentClassroom $studentClassroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentClassroom $studentClassroom)
    {
        //
    }
}
