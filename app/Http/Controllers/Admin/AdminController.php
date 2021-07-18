<?php

namespace App\Http\Controllers\Admin;

use App\Guru;
use App\Http\Controllers\Controller;
use App\Siswa;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        return view('layouts.master');
    }
    public function siswa() {
        $guru = Guru::all();
        $siswa = Siswa::all();
        return view('admin.siswa-index',compact('guru','siswa'));
    }

    public function testing() {

        $guru = Guru::all();
        return view('admin.pengajar-index',compact('guru'));
    }
    public function pengajar() {

        $guru = Guru::all();
        return view('admin.pengajar-index',compact('guru'));
    }

    public function user() {

        $user = User::all();
        return view('admin.user',compact('user'));
    }

    public function deleteUser($id) {

        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }


    public function pembayaran() {
        return view('admin.pembayaran');
    }
    public function dashboard() {

        $countGuru = DB::table('users')
        ->select(DB::raw('count(name) as dataGuru'))
        ->where('users.role','=','guru')
        ->get();

        $countSiswa = DB::table('users')
        ->select(DB::raw('count(name)as dataSiswa'))
        ->where('users.role','=','siswa')
        ->get();

        foreach($countGuru as $m){
            $getGuru = $m->dataGuru;
        }

        foreach($countSiswa as $m){
            $getSiswa = $m->dataSiswa;
        }

        // return $getGuru;
        return view('admin.dashboard',compact('getGuru','getSiswa'));
    }

    public function createSiswa(Request $request)
    {

        $this->validate($request,[

          'nama' => 'required|string|max:255',
            'jenisKelamin' => 'required',
            'kota' => 'required|string|max:255',
            'nomor' => 'required|min:10|unique:siswa',
            'tanggal' => 'required|date|max:255',
            'guru_id' => 'required|string|max:255',
            'kelas' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|',

        ]);
        //dd($request->all());

        //insert tabel user
        $user = new \App\User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password= bcrypt($request->password);
        $user->remember_token = Str::random(60);
        //dd($user);
        $user->save();
        // insert tabel mahasiswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = Siswa::create($request->all());

        //dd($mahasiswa);
        //return $siswa;
        return redirect('/siswa')->with('success','data berhasil ditambah');
    }

    public function editSiswa($id)
    {
      $siswa = \App\Siswa::find($id);
      $guru = \App\Guru::all();
      return view('admin.siswa-edit',compact('siswa','guru'));
    }

    public function updateSiswa(Request $request,$id)
    {
      $siswa = \App\Siswa::find($id);
      $siswa->update($request->all());
      return redirect ('/siswa')->with('sukses','data berhasil diupdate');

    }

    public function deleteSiswa($id)
    {
      $mahasiswa = \App\Siswa::find($id);
      $mahasiswa->delete();
      return redirect('/siswa')->with('sukses','data berhasil didelete');
    }

    //Dosen
    public function createGuru(Request $request)
    {

        //dd($request->all());
        $this->validate($request,[

            'nama' => 'required|string|max:255',
              'nomor' => 'required|min:8|unique:guru',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string|min:6|',

        ]);

    // //insert tabel user
    $user = new \App\User;
    $user->role = 'guru';
    $user->name = $request->nama;
    $user->email = $request->email;
    $user->password= bcrypt($request->password);
    $user->remember_token = Str::random(60);
    $user->save();
//dd($user);
     //insert
     $request->request->add(['user_id' => $user->id ]);
     $guru = Guru::create($request->all());

    //return $guru;
   return redirect('/guru')->with('success','data berhasil diinput');

}


    public function editGuru($id)
    {
      $guru = \App\Guru::find($id);
      return view('admin.pengajar-edit',compact('guru'));

    }
    public function updateGuru(Request $request,$id)
    {
      $dosen = \App\Guru::find($id);
      $dosen->update($request->all());
      return redirect ('/guru')->with('success','data berhasil diupdate');

    }

    public function deleteGuru($id)
    {
      $dosen = \App\Guru::find($id);
      $dosen->delete();
      return redirect('/guru')->with('sukses','data berhasil didelete');
    }
}
