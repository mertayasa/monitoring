<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPrilaku extends Model
{
    use HasFactory;

    public $table = 'nilai_prilaku';

    protected $fillable = [
        'id_durasi_nilai',
        'orientasi_pelayanan',
        'integritas',
        'komitmen',
        'disiplin',
        'kerjasama',
    ];

    public function durasiPenilaian()
    {
        return $this->belongsTo(DurasiPenilaian::class, 'id_durasi_nilai');
    }
}
