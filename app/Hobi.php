<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hobi extends Model
{
    //
    protected $filable = ['hobi'];
    public $timesstamp = true;
    public function mahasiswa(){
        return $this->belongsToMany('App\Mahasiswa','mahasiswa_hobi','id_mahasiswa','id_hobi');
    }
}
