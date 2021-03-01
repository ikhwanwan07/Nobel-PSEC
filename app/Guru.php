<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
   protected $table = 'guru';
   protected $fillable = ['nama','nomor','user_id'];

   public function siswa()
   {
    return $this->hasMany('App\Siswa');
    }

public function materi()
{
    return $this->hasMany('App\Materi');
}
public function soal()
{
    return $this->hasMany('App\Soal');
}
}
