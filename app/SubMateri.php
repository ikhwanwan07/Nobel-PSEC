<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
    protected $table = 'submateri';
   protected $fillable = ['materi_id','judul_sub','deskripsi','status'];

   public function materi()
   {
       return $this->belongsTo('App\Materi');
   }
   public function data()
   {
       return $this->hasMany('App\DataMateri');
   }
}
