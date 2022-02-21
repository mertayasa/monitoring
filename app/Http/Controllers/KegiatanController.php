<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\DataTables\KegiatanDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Kegiatan $kegiatan)
    {
    //    dd($kegiatan);
        return view('kegiatan.index', compact('kegiatan'));
    }

    public function datatable()
    {
        $kegiatan = Kegiatan::all();
        return KegiatanDataTable::set($kegiatan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kegiatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            Kegiatan::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data kegiatan Gagal Ditambahkan');
        }

        return redirect('kegiatan')->with('success', 'Data kegiatan Berhasil Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        return view('kegiatan.show', compact('kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        try {
            $kegiatan->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data kegiatan Gagal Di Edit');
        }

        return redirect('kegiatan')->with('info', 'Data kegiatan Berhasil Diedit  ');
    }

    public function kalender(Request $request)
    {
        $year = $request->has('tahun') ? $request->tahun : date('Y');
        $tahun_anggran = Kegiatan::select('tahun_anggaran')->distinct()->pluck('tahun_anggaran', 'tahun_anggaran')->toArray();
        if(!array_key_exists(date('Y'), $tahun_anggran)){
            $tahun_anggran += [date('Y') => date('Y')];
        }

        arsort($tahun_anggran, SORT_NUMERIC);

        $data = [
            'year' => $year,
            'kegiatan' => Kegiatan::where('tahun_anggaran', $year)->get(),
            'tahun_anggaran' => $tahun_anggran,
        ];

        return view('kegiatan.kalender', $data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        try {
            $kegiatan->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data kegiatan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data kegiatan']);
    }
    
}
