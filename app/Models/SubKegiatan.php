<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKegiatan extends Model
{
    use HasFactory;

    public $table = 'sub_kegiatan';

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
