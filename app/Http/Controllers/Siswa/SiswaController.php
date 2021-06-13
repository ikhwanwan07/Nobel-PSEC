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
        $getNilai = DB::table('nilai')
        ->select('quizzes.judul_quiz','quizzes.soal','nilai.nilai')
        ->join('quizzes','quizzes.id','=','nilai.quizzes_id')
        ->where('quizzes.soal','=','pretest')
        ->where('nilai.siswa_id','=',$auth)
        ->get();

        $data = [];
      $data2 = [];
      foreach($getNilai as $m)
      {
        if($getNilai->first()){
        $data[] = $m->judul_quiz;
        $data2[] = $m->nilai;
      }
      }
      //dd($auth);
        //dd($getNilai);
        return view('siswa.dashboard',compact('data','data2'));
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

        return view('siswa.nilai',compact('getNilai','getNilai2'));
    }
}
