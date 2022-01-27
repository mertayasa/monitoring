<?php

namespace App\Http\Controllers;

use App\Models\PangkatGolongan;
use Illuminate\Http\Request;
use App\DataTables\PangkatGolonganDataTable;
use Exception;
use Illuminate\Support\Facades\Log;


class PangkatGolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 public function index(PangkatGolongan $pangkat_golongan)
    {
    //    dd($pangkat_golongan);
        return view('pangkat_golongan.index', compact('pangkat_golongan'));
    }

     public function datatable()
    {
        $pangkat_golongan = PangkatGolongan::all();
        return PengumumanDataTable::set($pangkat_golongan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('pangkat_golongan.create');
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
            PangkatGolongan::create($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data PangkatGolongan Gagal Ditambahkan');
        }

        return redirect('pangkat_golongan')->with('success', 'Data PangkatGolongan Berhasil Ditambahkan');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PangkatGolongan  $pangkat_golongan
     * @return \Illuminate\Http\Response
     */
    public function show(PangkatGolongan $pangkat_golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PangkatGolongan  $pangkat_golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(PangkatGolongan $pangkat_golongan)
    {
        return view('pangkat_golongan.edit', compact('pangkat_golongan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PangkatGolongan  $pangkat_golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PangkatGolongan $pangkat_golongan)
    {
        try {
            $pangkat_golongan->update($request->all());
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Data PangkatGolongan Gagal Di Edit');
        }

        return redirect('pangkat_golongan')->with('info', 'Data PangkatGolongan Berhasil Diedit  ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PangkatGolongan  $pangkat_golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PangkatGolongan $pangkat_golongan)
    {
         try {
            $pangkat_golongan->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data PangkatGolongan']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data PangkatGolongan']);
    }
    
}