<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// fixing namespace error
use App\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Query Builder
        //$users = DB::table('students')->get();
        // dump($users);
        // var_dump($users);

        //Eloquent ORM
        $students = Student::all(); 
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string',
            'nim'     => 'required|digits:12|unique:students,nim',
            'jurusan' => 'required|string'
        ]);

        $student = new Student;
        $student->nama    = $request->nama;
        $student->nim     = $request->nim;
        $student->jurusan = $request->jurusan;
        $student->save();

        return redirect('/student')->with('status', 'Data Berhasil Ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'nama'    => 'required|string',
            'nim'     => 'required|size:12',
            'jurusan' => 'required|string'
        ]);

        Student::where('id', $student -> id)
        ->update([
            'nama'    => $request->nama,
            'nim'     => $request->nim,
            'jurusan' => $request->jurusan
        ]);
        return redirect('/student')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        Student::destroy($student->id);
        return redirect('/student')->with('status', 'Data Berhasil Dihapus');
    }
}
