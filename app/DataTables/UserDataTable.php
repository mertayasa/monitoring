<?php

namespace App\DataTables;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class UserDataTable
{
    static public function set($user, $level)
    {
        return Datatables::of($user)
            ->editColumn('foto', function ($user){
                return '<img src="'.$user->getFoto().'" alt="" width="75px">';
            })
            ->editColumn('status', function ($user){
                return $user->getStatus();
            })
            ->editColumn('tgl_mulai_kontrak', function ($user) use($level){
                return $user->getTglMulaiKontrak();
            })
            ->addColumn('action', function ($user) use($level) {
                $deleteUrl = "'" . route('user.destroy', [$level, $user->id]) . "', '".$level."DataTable'";
                if($level == User::$admin && (Auth::id() == $user->id || User::where('level', User::$admin)->count() == 1)){
                    return
                    '<div class="btn-group">' .
                        '<a href="' . route('user.edit', [$level, $user->id]) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                        '<a href="' . route('user.show', [$level, $user->id]) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                    '</div>';    
                }

                return
                    '<div class="btn-group">' .
                        '<a href="' . route('user.edit', [$level, $user->id]) . '" class="btn  btn-sm  btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px" ><b> Edit </b></a>' .
                        '<a href="' . route('user.show', [$level, $user->id]) . '" class="btn  btn-sm btn-info" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Lihat" style="margin-right: 5px" ><b> Lihat</b></a>' .
                        '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" style="margin-right: 5px"><b> Hapus</b></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'foto'])->make(true);
    }
}
