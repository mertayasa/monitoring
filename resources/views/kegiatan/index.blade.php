@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Kegiatan</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary add" data-bs-toggle="tooltip"
                            data-bs-placement="bottom" title="Tambah kegiatan"> <i class="fas fa-folder-plus"></i>
                            Kegiatan Baru</a>
                    </div>
                    <div class="px-3">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                    </div>
                    <div class="card-body">

                        <div class=" d-flex justify-content-between">
                            @include('kegiatan.datatable')

                            {{ $kegiatan->judul }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
