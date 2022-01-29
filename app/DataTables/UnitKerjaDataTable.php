<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class UnitKerjaDataTable
{
    static public function set($unit_kerja)
    {
        return Datatables::of($unit_kerja)

            ->addColumn('action', function ($unit_kerja) {
                 $deleteUrl = "'" . route('unit_kerja.destroy', $unit_kerja->id) . "', 'UnitKerjaDataTable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('unit_kerja.edit', $unit_kerja->id) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                    // '<a href="' . route('unit_kerja.show', $unit_kerja->id) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
