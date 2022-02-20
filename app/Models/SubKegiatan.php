<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function kegiatan()
    {
        return $this->belongsTo('App\Models\Kegiatan', 'id_kegiatan');
    }

    public function checkMingguKegiatan($week_index, $year)
    {
        $tgl_mulai_kegiatan = $this->tgl_mulai_kegiatan;
        $tgl_selesai_kegiatan = $this->tgl_selesai_kegiatan;
        $date = Carbon::now();
        $date->setISODate($year, $week_index);

        $start_of_week = $date->startOfWeek();
        $end_of_week = $date->endOfWeek();

        if ($start_of_week->format('Y-m-d') >= $tgl_mulai_kegiatan && $end_of_week->format('Y-m-d') <= $tgl_selesai_kegiatan) {
            return 'bg-success';
        }
    }
}
