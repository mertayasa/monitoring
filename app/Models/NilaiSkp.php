<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NilaiSkp extends Model
{
    use HasFactory;

    public $table = 'nilai_skp';
    
    protected $fillable = [
        'id_pgw_kontrak',
        'id_penilai',
        'tgl_mulai_penilaian',
        'tgl_selesai_penilaian',
        'permasalahan',
        'keberatan',
        'rekomendasi',
        'penjelasan_penilai',
        'keputusan_atasan',
    ];

    public function pgwKontrak()
    {
        return $this->belongsTo(User::class, 'id_pgw_kontrak');
    }

    public function penilai()
    {
        return $this->belongsTo(User::class, 'id_penilai');
    }

         public function getPersenSkpAttribute(){
        $sum = 0;
        $sum = $sum + ($this->attributes['nilai'] * 0.6);
        
        return $sum;
    }
}
