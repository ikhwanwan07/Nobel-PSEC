<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Materi;
use App\Quiz;
use App\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajarController extends Controller
{

    public function dashboard()
    {
        $auth = auth()->user()->guru->id;
        $dataNilai = DB::table('siswa')
        ->select(DB::raw('AVG(nilai) as rata'))
        ->join('nilai','siswa.id','=','nilai.siswa_id')
        ->join('quizzes','nilai.quizzes_id','=','quizzes.id')
        ->where('siswa.guru_id','=',$auth)
        ->where('quizzes.soal','=','pretest')
        ->groupBy('guru_id')
        ->get();

        foreach($dataNilai as $m){
            $fixNilai = $m->rata;
            $fix2 = substr($fixNilai,0,2);
        }

        $dataNilai2 = DB::table('siswa')
        ->select(DB::raw('AVG(nilai) as rata'))
        ->join('nilai','siswa.id','=','nilai.siswa_id')
        ->join('quizzes','nilai.quizzes_id','=','quizzes.id')
        ->where('siswa.guru_id','=',$auth)
        ->where('quizzes.soal','=','posttest')
        ->groupBy('guru_id')
        ->get();

        foreach($dataNilai2 as $m1){
            $fixNilai1 = $m1->rata;
            $fix1 = substr($fixNilai1,0,2);
        }

//cara ubah object ke integer /string
     //return $fix2;
      return view('pengajar.dashboard',compact('fix2','fix1'));
    }
    public function materi(){

        $materi = Materi::all();
        $guru_id = Auth::user()->guru->id;
        return view('pengajar.materi',compact('materi','guru_id'));
    }

    public function soal(){
        $dataSoal = Soal::all();
        $guru_id = Auth::user()->guru->id;
        return view('pengajar.soal',compact('guru_id','dataSoal'));
    }

    public function nilai(){
        $kelas = Auth::user()->guru->siswa;
        //dd($kelas);
        return view('pengajar.nilai',compact('kelas'));
    }

    public function kelas(){

        $kelas = Auth::user()->guru->siswa;
        //dd($kelas);
        return view('pengajar.kelas',compact('kelas'));
    }
    public function jawaban(){
        return view('pengajar.jawaban');
    }
    public function quiz(){
        $quiz= Quiz::all();
        return view('pengajar.quiz',compact('quiz'));
    }

}
