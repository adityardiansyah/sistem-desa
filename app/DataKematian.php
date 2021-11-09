<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKematian extends Model
{
    protected $table = 'data_kematian';
    protected $fillable = ['nik_pengurus','nik','tempat_wafat','sebab_wafat','hari_wafat','tgl_wafat','pukul'];
}
