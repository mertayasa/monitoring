<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use App\DataTables\UnitKerjaDataTable;
use Exception;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $unit_kerja = UnitKerja::all();
        // dd($unit_kerja);
        return view('unit_kerja.index', compact('unit_kerja'));
    }

    public function datatable()
    {
        $unit_kerja = UnitKerja::all();
        return UnitKerjaDataTable::set($unit_kerja);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('unit_kerja.create');
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
            UnitKerja::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Unit Kerja Gagal Ditambahkan');
        }

        return redirect('unit_kerja')->with('success', 'Data Unit Kerja Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitKerja  $unit_kerja
     * @return \Illuminate\Http\Response
     */
    public function show(UnitKerja $unit_kerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitKerja  $unit_kerja
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitKerja $unit_kerja)
    {
       return view('unit_kerja.edit', compact('unit_kerja'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitKerja  $unit_kerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitKerja $unit_kerja)
    {
       try {
            $unit_kerja->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data Unit Kerja Gagal Di Edit');
        }

        return redirect('unit_kerja')->with('info', 'Data Unit Kerja Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitKerja  $unit_kerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitKerja $unit_kerja)
    {
        $check_users = $unit_kerja->user()->count();
        if($check_users > 0) {
            return response(['code' => 0, 'message' => 'Data Unit Kerja Tidak Bisa Dihapus Karena Sudah Digunakan']);
        }

        try {
            $unit_kerja->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data Unit Kerja']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data Unit Kerja']);
    }
}
