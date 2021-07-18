<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = ['materi_id','judul_quiz','quiz','soal','deskripsi'];

    public function nilai()
    {
        return $this->hasMany('App\Nilai');
    }
    public function materi()
    {
        return $this->belongsTo('App\Materi');
    }

}
