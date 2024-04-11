<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\StudentClassroom;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classlist = Classroom::classroomList();
        $homeroom = Teacher::homeroom();

        $grades = ['1', '2', '3', '4', '5', '6'];
        return view('pages.class.index', compact('classlist', 'homeroom', 'grades'));
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
        $this->validate($request, [
            'class_name' => 'required',
            'grade' => 'required',
            'period' => 'required'
        ]);

        try {
            $input = $request->all();

            if ($input['teacher_id'] === 'null' || $input['teacher_id'] === '') {
                $input['teacher_id'] = null;
            }

            // dd($input);

            Classroom::create($input);

            Session::flash('success', 'Kelas berhasil dibuat');
            return redirect()->route('classroom.index');
        } catch (\Exception $e) {
            // Session::flash('error', $e->getMessage());
            Session::flash('error', 'Terjadi kesalahan ketika menyimpan data');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $class = Classroom::getSingleClass($id);
        // dd($class->id);
        $homeroom = Teacher::homeroom();
        // dd($homeroom);
        $grades = ['1', '2', '3', '4', '5', '6'];

        return view('pages.class.edit', compact('class', 'homeroom', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'class_name' => 'required',
            'grade' => 'required'
        ]);

        try {
            $class = Classroom::findOrFail($id);
            $input = $request->all();

            // dd($input);

            if ($input['teacher_id'] === 'null' || $input['teacher_id'] === '') {
                $input['teacher_id'] = null;
            }

            if (!$class) {
                throw new \Exception('Kelas tidak ditemukan.');
            }

            $class->update($input);

            Session::flash('success', 'Berhasil update data');
            return redirect()->route('classroom.index');
        } catch (\Exception $e) {
            Session::flash('error', 'Terjadi Kesalahan: ' . $e->getMessage());
            return back();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        //
    }
}
