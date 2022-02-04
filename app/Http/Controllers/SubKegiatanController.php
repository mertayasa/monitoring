<?php

namespace App\Http\Controllers;

use App\Models\SubKegiatan;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use App\DataTables\SubKegiatanDataTable;
use Exception;
use Illuminate\Support\Facades\Log;

class SubKegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubKegiatan $sub_kegiatan)
    {
    //    dd($sub_kegiatan);
        return view('sub_kegiatan.index', compact('sub_kegiatan'));
    }

    public function datatable()
    {
        $sub_kegiatan = SubKegiatan::all();
        return SubKegiatanDataTable::set($sub_kegiatan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kegiatan = Kegiatan::pluck('nama_program', 'id');
        if ($kegiatan->count() < 1) {
            return redirect()->route('kegiatan.index')->with('error', 'Anda belum memiliki data kegiatan, silahkan tambah kegiatan terlebih dahulu !');
        }
        return view('sub_kegiatan.create', compact('kegiatan'));
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
            SubKegiatan::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data sub kegiatan Gagal Ditambahkan');
        }

        return redirect('sub_kegiatan')->with('success', 'Data sub kegiatan Berhasil Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\kegiatan  $sub_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(SubKegiatan $sub_kegiatan)
    {
        return view('sub_kegiatan.show', compact('sub_kegiatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $sub_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(SubKegiatan $sub_kegiatan)
    {
        $kegiatan = Kegiatan::pluck('nama_program', 'id');
        if ($kegiatan->count() < 1) {
            return redirect()->route('kegiatan.index')->with('error', 'Anda belum memiliki data kegiatan, silahkan tambah kegiatan terlebih dahulu !');
        }
        return view('sub_kegiatan.edit', compact('sub_kegiatan', 'kegiatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $sub_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubKegiatan $sub_kegiatan)
    {
        try {
            $sub_kegiatan->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data sub kegiatan Gagal Di Edit');
        }

        return redirect('sub_kegiatan')->with('info', 'Data sub kegiatan Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $sub_kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubKegiatan $sub_kegiatan)
    {
        try {
            $sub_kegiatan->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data kegiatan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data kegiatan']);
    }
    
}
