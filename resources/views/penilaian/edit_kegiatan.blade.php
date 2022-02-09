@extends('layouts.app')

@section('content')
    @include('penilaian.stepper', ['is_active' => 2])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class=" mb-0 ">Kegiatan Tugas Jabatan</h5>
                    <button type="button" class="btn btn-primary"
                            data-bs-toggle="modal"
                            data-bs-target="#skpModal" 
                            data-bs-toggle="tooltip" 
                            data-bs-placement="bottom" 
                            title="Tambah Kegiatan SKP"
                            onclick="showAddKegiatanForm(this)">
                            <i class="fas fa-folder-plus"></i> Tambah kegiatan</button>
                </div>
                <div class="card-body pt-0">
                    @include('layouts.flash')
                    @include('layouts.error_message')
                    @include('penilaian.form-kegiatan')
                    <div class="row mt-3">
                        <div class="col-12">
                            <a href="{{ route('penilaian.edit', $nilai_skp->id) }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Edit Informasi Umum</a>
                            <a href="{{ route('penilaian.edit_prilaku', $nilai_skp->id) }}" class="btn btn-primary ml-3" type="submit">Simpan & Edit Perilaku <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection
