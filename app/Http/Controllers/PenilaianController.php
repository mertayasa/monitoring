<?php

namespace App\Http\Controllers;

use App\DataTables\PenilaianDataTable;
use App\Models\DurasiPenilaian;
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
        $durasi_penilaian = DurasiPenilaian::with('pgwKontrak', 'penilai')->latest();
        return PenilaianDataTable::set($durasi_penilaian);
    }

    public function create()
    {
        $data = [
            'pgw_kontrak' => ['' => 'Pilih pegawai kontrak'] + User::where('level', User::$kontrak)->pluck('nama', 'id')->toArray(),
            'penilai' => Auth::user(),
        ];

        return view('penilaian.create', $data);
    }

    public function store(Request $request)
    {
        try{
            $durasi_penilaian = DB::transaction(function () use($request) {
                $data = $request->all();
                $data['id_penilai'] = Auth::id();
                $penilaian = DurasiPenilaian::create($data);
                NilaiPrilaku::create([
                    'id_durasi_nilai' => $penilaian->id,
                ]);
                return $penilaian;
            }, 5);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data penilaian');
        }

        return redirect()->route('penilaian.edit_skp', $durasi_penilaian->id)->with('success', 'Berhasil menyimpan data penilaian');
    }

    public function editSkp(DurasiPenilaian $durasi_penilaian)
    {
        $target_skp = TargetSkp::where('id_durasi_nilai', $durasi_penilaian->id)->get();
        $data = [
            'durasi_penilaian' => $durasi_penilaian,
            'target_skp' => $target_skp,
        ];

        // dd($data);

        return view('penilaian.edit_skp', $data);
    }

    public function edit(DurasiPenilaian $durasi_penilaian)
    {
        $data = [
            'pgw_kontrak' => ['' => 'Pilih pegawai kontrak'] + User::where('level', User::$kontrak)->pluck('nama', 'id')->toArray(),
            'penilai' => Auth::user(),
            'durasi_penilaian' => $durasi_penilaian
        ];
        return view('penilaian.edit', $data);
    }

    public function update(Request $request, DurasiPenilaian $durasi_penilaian)
    {
        try{
            $durasi_penilaian->update($request->all());
            $durasi_penilaian = $durasi_penilaian->refresh();
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data penilaian');
        }

        return redirect()->route('penilaian.edit_skp', $durasi_penilaian->id)->with('success', 'Berhasil mengubah data penilaian');
    }
    
    public function destroy(DurasiPenilaian $durasi_penilaian)
    {
        try {
            $durasi_penilaian->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data penilaian']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data penilaian']);
    }
}
