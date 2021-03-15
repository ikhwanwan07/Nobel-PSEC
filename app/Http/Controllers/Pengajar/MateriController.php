<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
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

        $product = $request->all();
        $product['materi'] = $request->file('materi')->store('assets','public');
        $data = Materi::create($product);
       //dd($product);
        return redirect()->back();

        // //dd($request->all());

        // $materi = $request->file('materi')->store('assets/materi');

        // $dataMateri = Materi::create([
        //     'guru_id' => auth()->user()->guru->id,
        //     'judul_materi' => $request->judul_materi,
        //     'kelas' => $request->kelas,
        //     'link' => $request->link,
        //     'materi' => $materi,
        //     'deskripsi' => $request->deskripsi
        // ]);

        // //dd($dataMateri);
        // return redirect('/materi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataMateri = Materi::find($id);

        //$getData = Storage::get($dataMateri->materi);
        //dd($getData);
        return view('pengajar.showMateri',compact('dataMateri'));
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
