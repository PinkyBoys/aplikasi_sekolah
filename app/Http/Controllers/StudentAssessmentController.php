<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Classroom;
use App\Models\Score;
use App\Models\StudentAssessment;
use App\Models\StudentClassroom;
use App\Models\StudentProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class StudentAssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroom = Classroom::classroomList();


        return view('pages.assessment.student_assessment.index', compact('classroom'));
    }

    // public function index()
    // {

    //     return view('pages.assessment.student_assessment.index');
    // }


    public function assessment($id)
    {
        $classroom = Classroom::getSingleClass($id);
        $students = StudentClassroom::getStudentClassroom($id);
        $assessments = Assessment::getAllActiveAssessment();
        $semester = ['1' => '1', '2' => '2'];
        return view('pages.assessment.student_assessment.view', compact('classroom', 'students','assessments','semester'));
    }

    public function assessmentList($id)
    {
        $students = StudentClassroom::getStudentClassroom($id);
        $classroom = Classroom::getSingleClass($id);
        // dd($classroom->id);

        if(!$classroom){
            return abort(404);
        }

        $totalAssessment = Assessment::where('type', 'umum')->count();


        // dd($totalAssessment);

        return view('pages.assessment.student_assessment.score', compact('students', 'classroom', 'totalAssessment'));
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
        $validation = $request->validate([
            'selected_students.*' => 'required|exists:student_profiles,id',
            'score_num.*' => 'required|integer|min:0|max:100',
        ]);

        if (empty($validation['selected_students'])) {
            Session::flash('error', 'Pilih setidaknya 1 siswa');
            return back();
        }




        try {
            $input = $request->all();

            foreach($validation['selected_students'] as $studentId){
                $numericScore = $validation['score_num'][$studentId];
                $grades = Score::gradeStandard($numericScore);
                $input['score_let'] = $grades->letter;
                $input['student_id'] = $studentId;
                $input['score_num'] = $numericScore;
                StudentAssessment::create($input);
            }

            // dd($input);

            Session::flash('success','Berhasil menambahkan nilai siswa');
            return redirect()->route('student.assessment.index');

        }
        catch (\Illuminate\Database\QueryException $exception) {

            $errorCode = $exception->errorInfo[1];

            if ($errorCode == 1062) {
                $errorMessage = 'Data penilaian untuk siswa ini pada kelas dan semester tertentu sudah ada. Mohon periksa kembali detail penilaian siswa.';
                Session::flash('error', $errorMessage);
                return back();
            }
        }
        catch (\Exception $e){

            Session::flash('error', $e->getMessage());
            // Session::flash('error','Terjadi kesalahan ketika melakukan save data');
            return back();

        }
    }

/**
     * Display the specified resource.
     */
    public function show(StudentAssessment $studentAssessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $classroom = StudentClassroom::getSingleStudenProfileClass($id);
        return view('pages.assessment.student_assessment.edit', compact('classroom' ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentAssessment $studentAssessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentAssessment $studentAssessment)
    {
        //
    }
}
