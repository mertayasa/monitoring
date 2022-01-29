<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class PangkatGolonganDataTable
{
    static public function set($pangkat_golongan)
    {
        return Datatables::of($pangkat_golongan)

            ->addColumn('action', function ($pangkat_golongan) {
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('pangkat_golongan.edit', $pangkat_golongan->id) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    '<a href="' . route('pangkat_golongan.show', $pangkat_golongan->id) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
