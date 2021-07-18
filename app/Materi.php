<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materi';
   protected $fillable = ['guru_id','judul_materi','kelas','deskripsi','status'];

   public function guru()
   {
       return $this->belongsTo('App\Guru');
   }
   public function submateri()
   {
       return $this->hasMany('App\SubMateri');
   }

   public function getPhotoAttibute($value)
    {
        return url('storage/'.$value);
    }

    public function quiz()
    {
        return $this->hasMany('App\Quiz');
    }
}
