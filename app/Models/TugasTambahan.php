<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasTambahan extends Model
{
    use HasFactory;

    public $table = 'tugas_tambahan';

    protected $fillable = [
        'id_nilai_skp',
        'nama_tugas',
        'nilai',
    ];
}
