<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPenduduk extends Model
{
    protected $table = 'data_penduduk';

    protected $fillable = ['user_id', 'no_kk','nik','nama','tempat_lahir','tgl_lahir','jk','alamat','rt','rw','agama','rt','rw','status_perkawinan','pendidikan','pekerjaan','gol_darah','kewarganegaraan'];

    public $timestamps = false;
}
