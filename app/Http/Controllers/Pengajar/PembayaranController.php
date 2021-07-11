<?php

namespace App\Http\Controllers\Pengajar;

use App\Http\Controllers\Controller;
use App\Pembayaran;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $dataSiswa= Auth::user()->guru->siswa;
        //dd($dataSiswa);
        return view('pengajar.pembayaran',compact('dataSiswa'));
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
        $this->validate($request,[
            'pembayaran_ke' => 'required',
            'status' => 'required',
          ]);


   // return $request->all();
          if(Pembayaran::where('pembayaran_ke',$request->pembayaran_ke)->where('siswa_id',$request->siswa_id)->first() != null){
            return redirect()->back()->with('error','data sudah ada');
          }else{
            $dataPembayaran = Pembayaran::create($request->all());
            //return $request->all();
            return redirect()->back()->with('sukses','data berhasil ditambah');
          }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataSiswa = Siswa::findOrFail($id);
        $dataSiswa1 = Auth::user()->guru->siswa;
        //return $dataSiswa1;
        return view('pengajar.pembayaran-detail',compact('dataSiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('pengajar.pembayaran-detail-edit',compact('pembayaran'));

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
        $this->validate($request,[
            'pembayaran' => 'required',
            'status' => 'required',
          ]);
        $getId = $request->siswa_id;
        $getPembayaran = Pembayaran::find($id);
        $getPembayaran->update($request->all());

        return redirect()->route('pembayaran.show',$getId);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataPembayaran = Pembayaran::find($id);
        $dataPembayaran->delete();
        return redirect()->back();
    }
}
