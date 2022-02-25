<?php

namespace App\Http\Controllers;

use App\DataTables\PenilaianDataTable;
use App\Http\Requests\InfoUmumSkpRequest;
use App\Http\Requests\KegiatanSkpRequest;
use App\Http\Requests\NilaiPerilakuRequest;
use App\Http\Requests\NilaiPrilakuRequest;
use App\Http\Requests\NilaiSkpRequest;
use App\Http\Requests\TugasTambahanRequest;
use App\Models\KegiatanSkp;
use App\Models\NilaiSkp;
use App\Models\NilaiPrilaku;
use App\Models\TugasTambahan;
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
        if (Auth::user()->isKontrak()) {
            $nilai_skp = NilaiSkp::with('pgwKontrak', 'penilai')->where('id_pgw_kontrak', Auth::id())->get();
            // dd($nilai_skp);
        }
        else {
            $nilai_skp = NilaiSkp::with('pgwKontrak', 'penilai')->latest();
        }


        return PenilaianDataTable::set($nilai_skp);
    }

    public function create()
    {
        $data = [
            'pgw_kontrak' => ['' => 'Pilih pegawai kontrak'] + User::where('level', User::$kontrak)->where('status', 'aktif')->pluck('nama', 'id')->toArray(),
            'penilai' => ['' => 'Pilih penilai'] + User::where('level', User::$penilai)->pluck('nama', 'id')->toArray(),
        ];

        return view('penilaian.create', $data);
    }

    public function store(InfoUmumSkpRequest $request)
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

        return redirect()->route('penilaian.edit_kegiatan', $nilai_skp->id)->with('success', 'Berhasil menyimpan data penilaian');
    }

    public function edit(NilaiSkp $nilai_skp)
    {
        $data = [
            'pgw_kontrak' => ['' => 'Pilih pegawai kontrak'] + User::where('level', User::$kontrak)->where('status', 'aktif')->orWhere(function($user) use($nilai_skp){
                return $user->where('id', $nilai_skp->id_pgw_kontrak);
            })->pluck('nama', 'id')->toArray(),
            'penilai' => ['' => 'Pilih penilai'] + User::where('level', User::$penilai)->pluck('nama', 'id')->toArray(),
            'nilai_skp' => $nilai_skp
        ];
        return view('penilaian.edit', $data);
    }

    public function update(InfoUmumSkpRequest $request, NilaiSkp $nilai_skp)
    {
        try{
            $nilai_skp->update($request->all());
            $nilai_skp = $nilai_skp->refresh();
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data penilaian');
        }

        return redirect()->route('penilaian.edit_kegiatan', $nilai_skp->id)->with('success', 'Berhasil mengubah data penilaian');
    }


    // =========================================================================


    public function storeKegiatan(KegiatanSkpRequest $request, NilaiSkp $nilai_skp)
    {
        try{
            KegiatanSkp::create($request->validated());
            $table = KegiatanSkp::renderTable($nilai_skp->id);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menyimpan data kegiatan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menyimpan data kegiatan', 'table' => $table]);
    }

    public function editKegiatan(NilaiSkp $nilai_skp)
    {
        $kegiatan_skp = KegiatanSkp::where('id_nilai_skp', $nilai_skp->id)->get();
        $tugas_tambahan = TugasTambahan::where('id_nilai_skp', $nilai_skp->id)->get();
        $data = [
            'nilai_skp' => $nilai_skp,
            'kegiatan_skp' => $kegiatan_skp,
            'tugas_tambahan' => $tugas_tambahan,
        ];

        return view('penilaian.edit_kegiatan', $data);
    }

    public function updateKegiatan(KegiatanSkpRequest $request, NilaiSkp $nilai_skp, KegiatanSkp $kegiatan_skp)
    {
        try{
            $kegiatan_skp->update($request->validated());
            $table = KegiatanSkp::renderTable($nilai_skp->id);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mengubah data kegiatan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil mengubah data kegiatan', 'table' => $table]);
    }

    public function destroyKegiatan(NilaiSkp $nilai_skp, KegiatanSkp $kegiatan_skp)
    {
        try{
            $kegiatan_skp->delete();
            $table = KegiatanSkp::renderTable($nilai_skp->id);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data kegiatan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data kegiatan', 'table' => $table]);
    }


    // =========================================================================



    public function storeTugasTambahan(TugasTambahanRequest $request, NilaiSkp $nilai_skp)
    {
        try{
            TugasTambahan::create($request->validated());
            $table = TugasTambahan::renderTable($nilai_skp->id);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menyimpan data tugas tambahan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menyimpan data tugas tambahan', 'table' => $table]);
    }

    public function updateTugasTambahan(TugasTambahanRequest $request, NilaiSkp $nilai_skp, TugasTambahan $tugas_tambahan)
    {
        try{
            $tugas_tambahan->update($request->validated());
            $table = TugasTambahan::renderTable($nilai_skp->id);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mengubah data tugas tambahan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil mengubah data tugas tambahan', 'table' => $table]);
    }

    public function destroyTugasTambahan(TugasTambahan $nilai_skp, TugasTambahan $tugas_tambahan)
    {
        try{
            $tugas_tambahan->delete();
            $table = TugasTambahan::renderTable($nilai_skp->id);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data tugas tambahan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data tugas tambahan', 'table' => $table]);
    }


    // =========================================================================
    

    public function editPrilaku(NilaiSkp $nilai_skp)
    {
        $data = [
            'nilai_prilaku' => NilaiPrilaku::where('id_nilai_skp', $nilai_skp->id)->first(),
            'nilai_skp' => $nilai_skp,
        ];

        return view('penilaian.edit_prilaku', $data);
    }

    public function updatePrilaku(NilaiPerilakuRequest $request, NilaiSkp $nilai_skp)
    {
        try{
            $nilai_prilaku = NilaiPrilaku::where('id_nilai_skp', $nilai_skp->id)->first();
            $nilai_prilaku->update($request->validated());
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data prilaku');
        }

        return redirect()->route('penilaian.edit_nilai', $nilai_skp->id)->with('success', 'Berhasil mengubah data nilai prilaku');
    }


    // =========================================================================


    public function editNilai(NilaiSkp $nilai_skp)
    {
        $data = [
            'nilai_skp' => $nilai_skp,
        ];

        return view('penilaian.edit_nilai', $data);
    }

    public function updateNilai(NilaiSkpRequest $request, NilaiSkp $nilai_skp)
    {
        try{
            $nilai_skp->update($request->validated());
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data prilaku');
        }

        return redirect()->route('penilaian.index')->with('success', 'Berhasil mengubah data nilai prilaku');
    }


// ==================================================================

    public function show(NilaiSkp $nilai_skp)
    {
        $kegiatan_skp=KegiatanSkp::all();
        $nilai_prilaku=NilaiPrilaku::all()[0];
        $jumlah=$nilai_prilaku->total_nilai;
        $nilai_rata = $nilai_prilaku->nilai_rata;
        $nilai_prestasi_kerja = $nilai_prilaku->persen_prilaku + $nilai_skp->persen_skp;
        // dd($nilai_prestasi_kerja);

        $data = [
            'kegiatan_skp' => $kegiatan_skp,
            'nilai_prilaku' => $nilai_prilaku,
            'jumlah' => $jumlah,
            'nilai_skp' => $nilai_skp,
            'nilai_rata' => $nilai_rata,
            'nilai_prestasi_kerja' => $nilai_prestasi_kerja
        ];
        return view('penilaian.show', $data);
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
