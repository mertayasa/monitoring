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

    static function renderTable($id_nilai_skp)
    {
        $tugas_tambahan = self::where('id_nilai_skp', $id_nilai_skp)->get();
        return view('penilaian.table-tugas-tambahan', compact('tugas_tambahan'))->render();
    }
}
