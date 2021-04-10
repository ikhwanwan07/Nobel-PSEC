<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Materi;
use App\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajarController extends Controller
{

    public function dashboard()
    {
        return view('pengajar.dashboard');
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
        return view('pengajar.nilai');
    }

    public function kelas(){

        $kelas = Auth::user()->guru->siswa;
        //dd($kelas);
        return view('pengajar.kelas',compact('kelas'));
    }
    public function jawaban(){
        return view('pengajar.jawaban');
    }
}
