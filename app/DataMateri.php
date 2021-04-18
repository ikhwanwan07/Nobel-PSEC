<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataMateri extends Model
{
    protected $table = 'datamateri';
    protected $fillable = ['materi_id','sub_materi_id','kata','gambar','sound'];

    public function submateri()
    {
        return $this->belongsTo('App\SubMateri');
    }
}
