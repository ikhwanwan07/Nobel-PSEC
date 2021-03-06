<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Jawaban;
use App\Materi;
use App\Quiz;
use App\Soal;
use App\SubMateri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $auth = auth()->user()->siswa->id;
        $getN = DB::table('nilai')
        ->select('quizzes.judul_quiz','quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','pretest')
        ->where('nilai.siswa_id','=',$auth)
        ->get();

        $get2 = DB::table('nilai')
        ->select('quizzes.judul_quiz','quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','posttest')
        ->where('nilai.siswa_id','=',$auth)
        ->get();


      $data = [];
      $data2 = [];
      foreach($getN as $m)
      {
        if($getN->first()){
        $data[] = $m->judul_quiz;
        $data2[] = $m->nilai;
      }

    //   dd($data2);
      }
      $data3 = [];
      $data4 = [];
      foreach($get2 as $m)
      {
        if($get2->first()){
        $data3[] = $m->judul_quiz;
        $data4[] = $m->nilai;
      }
      }


      $dataNilaifix1 = DB::table('materi')
        ->select('materi.judul_materi','quizzes.soal','nilai.nilai')
        ->join('quizzes','materi.id','=','quizzes.materi_id')
        ->join('nilai','nilai.quizzes_id','=','quizzes.id')
        ->where('nilai.siswa_id','=',$auth)
        ->where('quizzes.soal','=','pretest')
        ->get();
        //return $dataNilaifix1;
        foreach($dataNilaifix1 as $m1){
            $fixNilai3 = $m1->judul_materi;
            $fixNilai4 = $m1->nilai;

        }

        $dataNilaifix2 = DB::table('materi')
        ->select('materi.judul_materi','quizzes.soal','nilai.nilai')
        ->join('quizzes','materi.id','=','quizzes.materi_id')
        ->join('nilai','nilai.quizzes_id','=','quizzes.id')
        ->where('nilai.siswa_id','=',$auth)
        ->where('quizzes.soal','=','posttest')
        ->get();
        //return $dataNilaifix1;
        foreach($dataNilaifix2 as $m1){
            $fixNilai5 = $m1->nilai;

        }
      //dd($auth);
       // dd($getNilai2);
       return view('siswa.dashboard',compact('data','data2','data3','data4','fixNilai3','fixNilai4','fixNilai5'));
    }
    public function jawaban(){
        $dataJawaban = Jawaban::all();
        return view('siswa.jawaban',compact('dataJawaban'));
    }
    public function pembayaranSiswa(){
        $dataPembayaran = Auth::user()->siswa->pembayaran;
        //return $dataPembayaran;
        return view('siswa.pembayaran',compact('dataPembayaran'));
    }
    public function materi(){

        $test = Auth::user()->siswa->kelas;
        $materi = Materi::where('kelas',$test)
                ->orderBy('judul_materi')
                ->get();

        //return $materi;
        return view('siswa.materi',compact('materi'));
    }
    public function soal(){

        $test = Auth::user()->siswa->kelas;
        $soal = Soal::where('kelas',$test)
                ->orderBy('id')
                ->get();
        return view('siswa.soal',compact('soal'));
    }
    public function viewMateri(){
        return view('siswa.view-materi');
    }
    public function profile(){
        return view('siswa.profile');
    }

    public function showMateri($id)
    {
        $dataMateri = Materi::find($id);
        return view('siswa.submateri',compact('dataMateri'));
    }
    public function showSubMateri($id)
    {
        $dataMateri = SubMateri::find($id);
        // $materi = DataMateri::all();
        return view('siswa.view-materi',compact('dataMateri'));
    }

    public function showSoal($id)
    {
        $dataSoal = Soal::find($id);
        return view('siswa.showSoal',compact('dataSoal'));
    }
    public function quiz(){
        $quiz = Quiz::all();
        return view('siswa.quiz',compact('quiz'));
    }

    public function nilai()
    {
        $auth = auth()->user()->siswa->id;
        $getNilai =  DB::table('nilai')
        ->select('quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','pretest')
        ->where('nilai.siswa_id','=',$auth)
        ->get();

        $getNilai2 =  DB::table('nilai')
        ->select('quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','posttest')
        ->where('nilai.siswa_id','=',$auth)
        ->get();

        return view('siswa.nilai',compact('getNilai','getNilai2'));
    }
}
