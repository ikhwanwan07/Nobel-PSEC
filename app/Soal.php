<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    protected $fillable = ['guru_id','kelas','soal','deskripsi','status'];

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function getPhotoAttibute($value)
     {
         return url('storage'.$value);
     }
}
