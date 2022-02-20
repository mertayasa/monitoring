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
        'kepemimpinan'
    ];

    public function nilaiSkp()
    {
        return $this->belongsTo(NilaiSkp::class, 'id_nilai_skp');
    }

     public function getTotalNilaiAttribute(){
        $sum = 0;
        $sum = $sum + ($this->attributes['orientasi_pelayanan'] + $this->attributes['integritas']+ $this->attributes['komitmen']+ $this->attributes['disiplin'] + $this->attributes['kerjasama'] + $this->attributes['kepemimpinan']);
        
        return $sum;
    }

      public function getNilaiRataAttribute(){
        $nilai_rata = 0;
        $nilai_rata = $nilai_rata + ($this->attributes['orientasi_pelayanan'] + $this->attributes['integritas']+ $this->attributes['komitmen']+ $this->attributes['disiplin'] + $this->attributes['kerjasama']+ $this->attributes['kepemimpinan'])/7;
        
        return $nilai_rata;
    }
}
