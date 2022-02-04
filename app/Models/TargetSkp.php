<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TargetSkp extends Model
{
    use HasFactory;

    public $table = 'target_skp';

    protected $fillable = [
        'id_durasi_nilai',
        'kegiatan',
        'kuantitas',
        'output',
        'waktu',
        'kualitas',
        'biaya',
        'status',
        'nilai',
        'total',
    ];
}
