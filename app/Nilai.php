<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $fillable = ['siswa_id','quizzes_id','nilai'];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }
}
