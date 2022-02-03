<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class SubKegiatanDataTable
{
    static public function set($sub_kegiatan)
    {
        return Datatables::of($sub_kegiatan)
         ->editColumn('tgl_mulai_kegiatan', function ($complaint) {
                return indonesianDate($complaint->tgl_mulai_kegiatan);
            })
            ->editColumn('tgl_selesai_kegiatan', function ($complaint) {
                return indonesianDate($complaint->tgl_selesai_kegiatan);
            })

            ->addColumn('action', function ($sub_kegiatan) {
                 $deleteUrl = "'" . route('sub_kegiatan.destroy', $sub_kegiatan->id) . "', 'SubKegiatanDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('sub_kegiatan.edit', $sub_kegiatan->id) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    // '<a href="' . route('sub_kegiatan.show', $sub_kegiatan->id) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
