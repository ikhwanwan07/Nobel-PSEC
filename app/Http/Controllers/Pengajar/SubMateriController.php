<?php

namespace App\Http\Controllers\Pengajar;

use App\DataMateri;
use App\Http\Controllers\Controller;
use App\SubMateri;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;

class SubMateriController extends Controller
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
        $dataSubMatri = SubMateri::create($request->all());
        return redirect()->back();

        // $subMateri = $request->all();
        // $subMateri['gambar'] = $request->file('gambar')->store('assets/gambar','public');
        // $subMateri['sound'] = $request->file('sound')->store('assets/sound','public');
        // $data = DataMateri::create($subMateri);
        // //dd($product);
        // return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataMateri = SubMateri::find($id);
        $materi = DataMateri::all();
        return view('pengajar.showMateri',compact('dataMateri','materi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataMateri = SubMateri::find($id);
        return view('pengajar.editSubMateri',compact('dataMateri'));
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
        $dataSubMateri = SubMateri::find($id);
        $dataSubMateri->update($request->all());
        return redirect()->back();
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
