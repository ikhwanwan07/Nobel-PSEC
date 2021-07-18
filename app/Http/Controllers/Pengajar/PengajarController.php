<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Materi;
use App\Quiz;
use App\Siswa;
use App\Soal;
use App\Nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajarController extends Controller
{
    // helper function to count average of array
    function average($array)
    {
        $total = 0;
        foreach ($array as $item) {
            $total += $item;
        };
        return $total/count($array);
    }

    function calculateAverageQuizzes($id_guru, $type){
        $raw_data_quizzes = Nilai::with(['siswa', 'quizzes'])
        ->whereHas('siswa', function($query) use($id_guru){
            $query->where('guru_id', $id_guru);
        })
        ->whereHas('quizzes', function($query) use($type){
            $query->where('soal', $type);
        })
        ->get();

        $data_quizzes = [];
        foreach($raw_data_quizzes as $key => $item){
            $data_quizzes[$item['quizzes']['judul_quiz']][] = $item['nilai'];
        }

        $final_quizzes = [];
        foreach($data_quizzes as $key => $quizzes){
            $final_quizzes[$key] = $this->average($quizzes);
        }

        return $final_quizzes;
    }

    // main function
    public function dashboard()
    {
        $fix2 = null;
        $fix1 = null;

        $auth = auth()->user()->guru->id;
        $dataNilai = DB::table('siswa')
        ->select(DB::raw('AVG(nilai) as rata'))
        ->join('nilai','siswa.id','=','nilai.siswa_id')
        ->join('quizzes','nilai.quizzes_id','=','quizzes.id')
        ->where('siswa.guru_id','=',$auth)
        ->where('quizzes.soal','=','pretest')
        ->groupBy('guru_id')
        ->get();

       $data_pretest = $this->calculateAverageQuizzes($auth, 'pretest');
       $data_posttest = $this->calculateAverageQuizzes($auth, 'posttest');

       // pretest
       $data = array_keys($data_pretest);
       $data2 = array_values($data_pretest);
// dd($data2);
       // posttest
       $data3 = array_keys($data_posttest);
       $data4 = array_values($data_posttest);

        if($dataNilai->isEmpty()){
             $data = 0;
        }else{
            foreach($dataNilai as $m){
                $fixNilai = $m->rata;
                $fix1 = substr($fixNilai,0,2);
            }
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
            $fixNilai2 = $m1->rata;
            $fix2 = substr($fixNilai2,0,2);
        }


        $dataNilaifix1 = DB::table('materi')
        ->select('materi.judul_materi','quizzes.soal','nilai.nilai')
        ->join('quizzes','materi.id','=','quizzes.materi_id')
        ->join('nilai','nilai.quizzes_id','=','quizzes.id')
        ->where('materi.guru_id','=',$auth)
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
        ->where('materi.guru_id','=',$auth)
        ->where('quizzes.soal','=','posttest')
        ->get();
        //return $dataNilaifix1;
        foreach($dataNilaifix2 as $m1){
            $fixNilai5 = $m1->nilai;

        }
        // return $fixNilai4;
//cara ubah object ke integer /string

     return view('pengajar.dashboard',compact('fix1','fix2','data','data2','data3','data4','fixNilai3','fixNilai4','fixNilai5'));
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
        $materi = Materi::all();
        return view('pengajar.quiz',compact('quiz','materi'));
    }

    public function getProfile($id) {
        $getProfile = Siswa::find($id);

        return view('pengajar.profile',compact('getProfile'));

    }


}
