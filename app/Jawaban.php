<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
   protected $fillable = ['materi_id','siswa_id','jawaban','status'];


}
