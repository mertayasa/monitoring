<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiPrilaku extends Model
{
    use HasFactory;

    public $table = 'nilai_prilaku';

    protected $fillable = [
        'id_nilai_skp',
        'orientasi_pelayanan',
        'integritas',
        'komitmen',
        'disiplin',
        'kerjasama',
    ];

    public function nilaiSkp()
    {
        return $this->belongsTo(NilaiSkp::class, 'id_nilai_skp');
    }
}
