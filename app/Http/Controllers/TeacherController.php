<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Faker\Guesser\Name;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::teacherList();
        $roles = User::roleTeacher();


        // dd($teachers);

        return view('pages.admin.teacher.index', compact('teachers', 'roles'));
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
            'user_id' => 'required',
            'phone' => 'nullable|min:10'
        ]);

        try {
            $input = $request->all();

            // dd($input);

            Teacher::create($input);
            Session::flash('success', 'Berhasil menambahkan guru');
            return redirect()->route('teacher.index');
        } catch (\Exception $e) {
            // Session::flash('error', $e->getMessage());
            Session::flash('error','Terjadi kesalahan saat menyimpan data');
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $teacher = Teacher::getSingleTeacher($id);
        $status = [true => 'Aktif', false => 'Non Aktif'];
        // dd($teacher);
        return view('pages.admin.teacher.edit', compact('teacher', 'status'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {

    //     $teacher = Teacher::getSingleTeacher($id);

    //     try {
    //         $data = $request->all();
    //         // dd($data);
    //         if ($request->hasFile('img')) {
    //             File::delete("uploads/profile/guru/" . $teacher->img);
    //             $img = $request->file("img");
    //             $imageName = "IMG" . strtoupper(Str::random(10)) . "." . $img->getClientOriginalExtension();
    //             try {
    //                 $img->move("uploads/profile/guru/", $imageName);
    //             } catch (\Exception $e) {
    //                 return back()
    //                     ->withErrors(['image' => 'Error moving image: ' . $e->getMessage()])
    //                     ->withInput();
    //             }
    //             $data['img'] = $imageName;
    //         } else {
    //             unset($data['img']);
    //         }
    //         // dd($data);
    //         $teacher->update($data);

    //         Session::flash('success', 'Berhasil melakukan perubahan');
    //         return redirect()->route('teacher.index');
    //     } catch (\Exception $e) {
    //         Session::flash('error', $e);
    //         // Session::flash('error', 'Terjadi error ketika melakukan perubahan');
    //         return back();
    //     }
    // }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::getSingleTeacher($id);
        try {
            $input = $request->all();

            $teacher->update([
                'nip' => $input['nip'],
                'is_homeroom' => $input['is_homeroom'],
                'status' => $input['status']
            ]);

            Session::flash('success', 'Berhasil Update Data');

            return redirect()->route('teacher.index');
        } catch (\Exception $e) {
            // Session::flash('error', $e->getMessage());
            Session::flash('error', 'Terjadi Kesalahan Ketika Menyimpan Data');

            return back();
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
}
