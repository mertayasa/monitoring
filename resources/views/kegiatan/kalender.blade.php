@extends('layouts.app')
@push('styles')
    <style>
        .input-group>.select2-container--bootstrap4 {
            width: auto !important;
            flex: 1 1 auto !important;
        }

        .input-group>.select2-container--bootstrap4 .select2-selection--single {
            height: 100% !important;
            line-height: inherit !important;
        }

    </style>
@endpush
@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Kalender Kegiatan Tahun Anggaran {{ $year }}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-12 col-md-4">
                            {!! Form::open(['method' => 'get']) !!}
                                <p>Pilih tahun anggaran</p>
                                <div class="input-group mb-2 mr-sm-2">
                                    {!! Form::select('tahun', $tahun_anggaran, $year, ['class' => 'form-control', 'id' => 'selectTahun']) !!}
                                    <div class="input-group-prepend">
                                        <button type="submit" class="input-group-text bg-primary text-light" style="height: 100%">Pilih Tahun</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @include('kegiatan.table_kalender')
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
