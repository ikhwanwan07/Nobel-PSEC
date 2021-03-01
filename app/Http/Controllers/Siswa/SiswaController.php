<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Materi;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function jawaban(){
        return view('siswa.jawaban');
    }
    public function pembayaran(){
        return view('siswa.pembayaran');
    }
    public function materi(){

        $materi = Materi::all();
        return view('siswa.materi',compact('materi'));
    }
    public function soal(){
        return view('siswa.soal');
    }
    public function viewMateri(){
        return view('siswa.view-materi');
    }
    public function profile(){
        return view('siswa.profile');
    }
}
