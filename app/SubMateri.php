<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubMateri extends Model
{
    protected $table = 'submateri';
   protected $fillable = ['materi_id','kata','gambar','sound'];

   public function materi()
   {
       return $this->belongsTo('App\Materi');
   }
}
