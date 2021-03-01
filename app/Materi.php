<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
   protected $fillable = ['guru_id','judul_materi','kelas','link','materi','deskripsi'];

   public function guru()
   {
       return $this->belongsTo('App\Guru');
   }

   public function getPhotoAttibute($value)
    {
        return url('storage/'.$value);
    }
}
