<?php

namespace App\Http\Controllers;

use App\DataTables\PenilaianDataTable;
use App\Models\NilaiSkp;
use App\Models\NilaiPrilaku;
use App\Models\TargetSkp;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PenilaianController extends Controller
{
    public function index()
    {
        return view('penilaian.index');
    }

    public function datatable()
    {
        $nilai_skp = NilaiSkp::with('pgwKontrak', 'penilai')->latest();
        return PenilaianDataTable::set($nilai_skp);
    }

    public function create()
    {
        $data = [
            'pgw_kontrak' => ['' => 'Pilih pegawai kontrak'] + User::where('level', User::$kontrak)->pluck('nama', 'id')->toArray(),
            'penilai' => ['' => 'Pilih penilai'] + User::where('level', User::$penilai)->pluck('nama', 'id')->toArray(),
        ];

        return view('penilaian.create', $data);
    }

    public function store(Request $request)
    {
        try{
            $nilai_skp = DB::transaction(function () use($request) {
                $data = $request->all();
                $penilaian = NilaiSkp::create($data);
                NilaiPrilaku::create([
                    'id_nilai_skp' => $penilaian->id,
                ]);
                return $penilaian;
            }, 5);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data penilaian');
        }

        return redirect()->route('penilaian.edit_skp', $nilai_skp->id)->with('success', 'Berhasil menyimpan data penilaian');
    }

    public function editSkp(NilaiSkp $nilai_skp)
    {
        $target_skp = TargetSkp::where('id_nilai_skp', $nilai_skp->id)->get();
        $data = [
            'nilai_skp' => $nilai_skp,
            'target_skp' => $target_skp,
        ];

        return view('penilaian.edit_skp', $data);
    }

    public function edit(NilaiSkp $nilai_skp)
    {
        $data = [
            'pgw_kontrak' => ['' => 'Pilih pegawai kontrak'] + User::where('level', User::$kontrak)->pluck('nama', 'id')->toArray(),
            'penilai' => ['' => 'Pilih penilai'] + User::where('level', User::$penilai)->pluck('nama', 'id')->toArray(),
            'nilai_skp' => $nilai_skp
        ];
        return view('penilaian.edit', $data);
    }

    public function update(Request $request, NilaiSkp $nilai_skp)
    {
        try{
            $nilai_skp->update($request->all());
            $nilai_skp = $nilai_skp->refresh();
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data penilaian');
        }

        return redirect()->route('penilaian.edit_skp', $nilai_skp->id)->with('success', 'Berhasil mengubah data penilaian');
    }
    
    public function destroy(NilaiSkp $nilai_skp)
    {
        try {
            $nilai_skp->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data penilaian']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data penilaian']);
    }
}
