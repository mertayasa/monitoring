<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{
    use HasFactory;
     protected $table = 'sub_kegiatans';

    protected $fillable = [
        'id_kegiatan',
        'nama_sub',
        'tgl_mulai_kegiatan',
        'tgl_selesai_kegiatan'
    ];

      public $with = [
        'kegiatan'
    ];

   function kegiatan()
    {
        return $this->belongsTo('App\Models\Kegiatan', 'id_kegiatan');
    }
}
