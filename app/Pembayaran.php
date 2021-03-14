<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
   protected $fillable = ['siswa_id','status','pembayaran_ke'];

   public function siswa()
   {
    return $this->belongsTo('App\Siswa');
    }
}
