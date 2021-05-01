<?php

namespace App\Http\Controllers\Pengajar;

use App\DataMateri;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataMateriController extends Controller
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
        //dd($request->all());
         $subMateri = $request->all();
         $subMateri['gambar'] = $request->file('gambar')->store('assets/gambar','public');
         $subMateri['sound'] = $request->file('sound')->store('assets/sound','public');
         $data = DataMateri::create($subMateri);
        //dd($product);
         return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataMateri = DataMateri::find($id);

        return view('pengajar.editDataMateri',compact('dataMateri'));
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
        $con = $request->sub_materi_id;
        $subMateri = $request->all();
        $subMateri['gambar'] = $request->file('gambar')->store('assets/gambar','public');
        $subMateri['sound'] = $request->file('sound')->store('assets/sound','public');
        $data = DataMateri::find($id);
        $data->update($subMateri);
        return redirect()->route('subMateri.show',$con);
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
