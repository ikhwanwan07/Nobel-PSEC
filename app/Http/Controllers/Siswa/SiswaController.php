<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Materi;
use App\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function jawaban(){
        return view('siswa.jawaban');
    }
    public function pembayaran(){
        return view('siswa.pembayaran');
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
        return view('siswa.view-materi',compact('dataMateri'));
    }

    public function showSoal($id)
    {
        $dataSoal = Soal::find($id);
        return view('siswa.showSoal',compact('dataSoal'));
    }
}
