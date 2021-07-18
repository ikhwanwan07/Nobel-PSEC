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
    public function store(Request $request )
    {
        $this->validate($request,[
            'nilai' => 'required|numeric|min:0|max:100',
          ]);


          if(Nilai::where('quizzes_id',$request->quizzes_id)->where('siswa_id',$request->siswa_id)->first() != null)
          {
            return redirect()->back()->with('error','data sudah ada');
          }else{
            $nilai = Nilai::create($request->all());
            return redirect()->back()->with('sukses','data ditambahkan');
          }
        //dd($request->all())

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
        ->select('nilai.id','quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','pretest')
        ->where('nilai.siswa_id','=',$id)
        ->get();

        $getNilai2 =  DB::table('nilai')
        ->select('nilai.id','quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','posttest')
        ->where('nilai.siswa_id','=',$id)
        ->get();
       // dd($getNilai);
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
        $nilai = Nilai::find($id);
        return $nilai;
        //$getQuiz = Quiz::all();
        //return view('pengajar.view-nilai-edit',compact('nilai','getQuiz'));
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
        $nilai = Nilai::find($id);
        $nilaiId = $request->siswa_id;

        $nilai->update($request->all());
        return redirect()->route('nilai.show',$nilaiId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nilai = Nilai::find($id);
        $nilai->delete();
        return redirect()->back();
    }
    }

