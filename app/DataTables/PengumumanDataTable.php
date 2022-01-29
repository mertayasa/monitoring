<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class PengumumanDataTable
{
    static public function set($pengumuman)
    {
        return Datatables::of($pengumuman)
            ->addColumn('action', function ($pengumuman) {
              $deleteUrl = "'" . route('pengumuman.destroy', $pengumuman->id) . "', 'PengumumanDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('pengumuman.edit', $pengumuman->id) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="' . route('pengumuman.show', $pengumuman->id) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }
}
