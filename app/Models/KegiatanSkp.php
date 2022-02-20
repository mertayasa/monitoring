<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanSkp extends Model
{
    use HasFactory;

    public $table = 'kegiatan_skp';

    protected $fillable = [
        'id_nilai_skp',
        'kegiatan',
        'kuantitas',
        'satuan_kuantitas',
        'kualitas',
        'waktu',
        'satuan_waktu',
        'biaya',
    ];

    static function renderTable($id_nilai_skp)
    {
        $kegiatan_skp = self::where('id_nilai_skp', $id_nilai_skp)->get();
        return view('penilaian.table-kegiatan', compact('kegiatan_skp'))->render();
    }
}
