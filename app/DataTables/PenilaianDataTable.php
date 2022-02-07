<?php

namespace App\DataTables;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class PenilaianDataTable
{
    static public function set($penilaian)
    {
        return Datatables::of($penilaian)
            ->editColumn('durasi', function ($penilaian) {
                $tgl_mulai = $penilaian->tgl_mulai_penilaian ? indonesianDate($penilaian->tgl_mulai_penilaian) : '';
                $tgl_selesai = $penilaian->tgl_selesai_penilaian ? indonesianDate($penilaian->tgl_selesai_penilaian) : '';
                return $tgl_mulai.' s/d '.$tgl_selesai;
            })
            ->addColumn('action', function ($penilaian) {
                $deleteUrl = "'" . route('penilaian.destroy', $penilaian->id) . "', 'PenilaianDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('penilaian.edit', $penilaian->id) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }
}
