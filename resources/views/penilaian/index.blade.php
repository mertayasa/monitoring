@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Penilaian</h1>

        <div class="row">
            <div class="col-12">
                <div class="card mb-2">
                    <div class="card-header d-flex flex-column justify-content-between align-items-center">
                        <div class="col-12">
                            @if (Auth::user()->isAdmin())
                                <a href="{{ route('penilaian.create') }}" class="btn btn-primary add"
                                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tambah Penilaian"> <i
                                        class="fas fa-folder-plus"></i>
                                    Penilaian Baru</a>
                            @endif
                        </div>
                        <div class="col-12">
                            {!! Form::open(['method' => 'get']) !!}
                                <div class="row mt-3">
                                    <div class="col-12 col-md-3">
                                        {!! Form::label('filterUser', 'Pegawai Kontrak', []) !!}
                                        {!! Form::select('pgw_kontrak', ['Pilih Pegawai'], null, ['class' => 'form-control use-select2-height', 'id' => 'filterUser']) !!}
                                    </div>
                                    <div class="col-12 col-md-3 align-self-end">
                                        {!! Form::label('filterStartDate', 'Tanggal Mulai', []) !!}
                                        {!! Form::date('tgl_mulai', null, ['class' => 'form-control use-select2-height', 'id' => 'filterStartDate']) !!}
                                    </div>
                                    <div class="col-12 col-md-3 align-self-end">
                                        {!! Form::label('filterEndDate', 'Tanggal Selesai', []) !!}
                                        {!! Form::date('tgl_selesai', null, ['class' => 'form-control use-select2-height', 'id' => 'filterEndDate']) !!}
                                    </div>
                                    <div class="col-12 col-md-3 d-flex align-items-end">
                                        <button class="btn btn-primary use-select2-height">Filter Data</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="px-3">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                    </div>
                    {{-- <div class="card-body pt-0">
                        <div class=" d-flex justify-content-between">
                            @include('penilaian.datatable')
                        </div>
                    </div> --}}
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class=" d-flex justify-content-between">
                            @include('penilaian.datatable')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
