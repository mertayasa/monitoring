<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class JabatanDataTable
{
    static public function set($jabatan)
    {
        return Datatables::of($jabatan)
            ->addColumn('action', function ($jabatan) {
              $deleteUrl = "'" . route('jabatan.destroy', $jabatan->id) . "', 'JabatanDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('jabatan.edit', $jabatan->id) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    // '<a href="' . route('jabatan.show', $jabatan->id) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }
}
