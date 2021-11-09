<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataKelahiran extends Model
{
    protected $table = 'data_kelahiran';
    protected $fillable = ['data_penduduk_id','no_kk','hari','tempat_lahir','tgl_lahir','pukul','jenis_kelahiran','anak_ke','berat_bayi','panjang_bayi','nik_ayah','nik_ibu'];

    /**
     * Get the data_penduduk that owns the DataKelahiran
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function data_penduduk()
    {
        return $this->belongsTo(DataPenduduk::class);
    }
}
