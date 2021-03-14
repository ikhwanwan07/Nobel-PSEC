<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = ['guru_id','user_id','nama','jenisKelamin','kota','tanggal','kelas'];



    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran');
    }
}
