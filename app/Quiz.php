<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    protected $table = 'quizzes';

    protected $fillable = ['judul_quiz','quiz','soal','deskripsi'];

    public function nilai()
    {
        return $this->hasMany('App\Nilai');
    }

}
