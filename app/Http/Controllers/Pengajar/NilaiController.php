<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Nilai;
use App\Quiz;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->all());
        $nilai = Nilai::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $siswa = Siswa::find($id);
        $getQuiz = Quiz::all();
        $getNilai =  DB::table('nilai')
        ->select('quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','pretest')
        ->get();

        $getNilai2 =  DB::table('nilai')
        ->select('quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','posttest')
        ->get();
        //dd($getNilai)->json_decode();
        return view('pengajar.view-nilai',compact('siswa','getQuiz','getNilai','getNilai2'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}