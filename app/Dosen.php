<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    //
        protected $filable = ['nama','nipd'];
        public $timesstamp = true;
        public function mahasiswa(){
            return $this->hasMany('App\Mahasiswa','id_dosen');
        }
}
