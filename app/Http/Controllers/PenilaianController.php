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
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PenilaianController extends Controller
{
    public function index()
    {
        $pegawai_kontrak = User::kontrak()->pluck('nama', 'id');
        $data = [
            'pegawai_kontrak' => ['' => 'Pilih Pegawai'] + $pegawai_kontrak->toArray()
        ];

        return view('penilaian.index', $data);
    }

    public function datatable(Request $request)
    {
        if (Auth::user()->isKontrak()) {
            $nilai_skp = NilaiSkp::with('pgwKontrak', 'penilai')->where('id_pgw_kontrak', Auth::id())->get();
        }
        else {
            $nilai_skp = $this->filterSkp($request);
            // $nilai_skp = NilaiSkp::with('pgwKontrak', 'penilai')->latest();
        }


        return PenilaianDataTable::set($nilai_skp);
    }

    public function filterSkp($request)
    {
        $tgl_mulai = $request->tgl_mulai ?? null;
        $tgl_selesai = $request->tgl_selesai ?? null;
        Log::info($tgl_mulai);
        Log::info($tgl_selesai);
        $id_pgw_kontrak = $request->id_pgw_kontrak ?? null;

        $nilai_skp = NilaiSkp::with('pgwKontrak', 'penilai');

        if($id_pgw_kontrak != null){
            $nilai_skp->where('id_pgw_kontrak', $id_pgw_kontrak);
        }

        if($tgl_mulai != null){
            if($tgl_selesai != null){
                $nilai_skp->whereDate('tgl_mulai_penilaian', '>=', $tgl_mulai)->whereDate('tgl_selesai_penilaian', '<=', $tgl_selesai);
            }else{
                Log::info('asds');
                $nilai_skp->whereDate('tgl_mulai_penilaian', '>=', $tgl_mulai);
            }
        }

        $nilai_skp = $nilai_skp->get();

        return $nilai_skp;
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
            $data = $request->validated();
            $data['tgl_mulai_penilaian'] = Carbon::parse($data['durasi_penilaian'] == 1 ? '01-01-'.date('Y') : '01-07-'.date('Y'))->format('Y-m-d');
            $data['tgl_selesai_penilaian'] = Carbon::parse($data['durasi_penilaian'] == 1 ? '30-06-'.date('Y') : '31-12-'.date('Y'))->format('Y-m-d');
            $nilai_skp->update($data);
            $nilai_skp = $nilai_skp->refresh();
        }catch(Exception $e){
            Log::info($e->getMessage());
            dd($e->getMessage());
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
            // $nilai_prilaku = NilaiPrilaku::where('id_nilai_skp', $nilai_skp->id)->first();
            // $nilai_prilaku->updateOrCreate([
            //     'id_nilai_skp' => $nilai_skp->id,
            // ], $request->validated());
            NilaiPrilaku::updateOrCreate([
                'id_nilai_skp' => $nilai_skp->id,
            ], $request->validated());
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
        $kegiatan_skp=KegiatanSkp:: where('id_nilai_skp', $nilai_skp->id)->get();
        $nilai_prilaku=NilaiPrilaku::where('id_nilai_skp', $nilai_skp->id)->get()[0] ?? [];
        // $jumlah=$nilai_prilaku->total_nilai;
        // $nilai_rata = $nilai_prilaku->nilai_rata;
        // $nilai_prestasi_kerja = $nilai_prilaku->persen_prilaku + $nilai_skp->persen_skp;
        // dd($nilai_prestasi_kerja);

        $data = [
            'kegiatan_skp' => $kegiatan_skp,
            'nilai_prilaku' => $nilai_prilaku,
            // 'jumlah' => $jumlah,
            'nilai_skp' => $nilai_skp,
            // 'nilai_rata' => $nilai_rata,
            // 'nilai_prestasi_kerja' => $nilai_prestasi_kerja
        ];
        return view('penilaian.show', $data);
    }

// ====================================================================

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

// ======================================================================

    public function print(NilaiSkp $nilai_skp, NilaiPrilaku $nilai_prilaku)
    {
        // $kegiatan_skp=KegiatanSkp::where('id_nilai_skp' , $nilai_skp->id)->get();
        // $nilai_prilaku=NilaiPrilaku::where('id_nilai_skp' , $nilai_skp->id)->get();
        // $jumlah=$nilai_prilaku->total_nilai;
        // $nilai_rata = $nilai_prilaku->nilai_rata;
        // $nilai_prestasi_kerja = $nilai_prilaku->persen_prilaku + $nilai_skp->persen_skp;
        // $persen_skp = $nilai_skp->persen_skp;
        // // $nilai_skp= NilaiSkp::all();
        // // dd($nilai_prestasi_kerja);

        // $data = [
        //     'kegiatan_skp' => $kegiatan_skp,
        //     'nilai_prilaku' => $nilai_prilaku,
        //     'jumlah' => $jumlah,
        //     'nilai_skp' => $nilai_skp,
        //     'nilai_rata' => $nilai_rata,
        //     'nilai_prestasi_kerja' => $nilai_prestasi_kerja,
        //     'persen_skp' => $persen_skp,
        //     'nilai_skp' => $nilai_skp
        // ];

        $kegiatan_skp=KegiatanSkp:: where('id_nilai_skp', $nilai_skp->id)->get();
        $nilai_prilaku=NilaiPrilaku::where('id_nilai_skp', $nilai_skp->id)->get()[0];
        // $jumlah=$nilai_prilaku->total_nilai;
        // $nilai_rata = $nilai_prilaku->nilai_rata;
        // $nilai_prestasi_kerja = $nilai_prilaku->persen_prilaku + $nilai_skp->persen_skp;
        // dd($nilai_prestasi_kerja);

        $data = [
            'kegiatan_skp' => $kegiatan_skp,
            'nilai_prilaku' => $nilai_prilaku,
            // 'jumlah' => $jumlah,
            'nilai_skp' => $nilai_skp,
            // 'nilai_rata' => $nilai_rata,
            // 'nilai_prestasi_kerja' => $nilai_prestasi_kerja
        ];
        
        // return view('inventorie.export_pdf', compact('nilai_skps', 'ttd', 'ttdUser'));
        $pdf = PDF::loadview('penilaian.export_pdf', $data)->setPaper('a4', 'landscape');
        return $pdf->stream('skp'  . Carbon::now() . '.pdf');
    }

}
