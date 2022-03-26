@extends('layouts.app')
@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('plugin/flatpickr/flatpickr.min.css') }}" />
    <style>
        .date-picker:disabled, .date-picker[readonly] {
            background-color: #fff;
            opacity: 1;
        }
    </style>
@endpush
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
                        @if (Auth::user()->isPenilai() or Auth::user()->isAdmin())
                            <div class="col-12">
                                {!! Form::open(['method' => 'get', 'id' => 'filterForm']) !!}
                                    <div class="row mt-3">
                                        <div class="col-12 col-md-3">
                                            {!! Form::label('filterUser', 'Pegawai Kontrak', []) !!}
                                            {!! Form::select('id_pgw_kontrak', $pegawai_kontrak, null, ['class' => 'form-control', 'id' => 'filterUser']) !!}
                                        </div>
                                        <div class="col-12 col-md-3 align-self-end">
                                            {!! Form::label('filterStartDate', 'Tanggal Mulai', []) !!}
                                            {!! Form::text('tgl_mulai', null, ['class' => 'form-control date-picker', 'id' => 'filterStartDate']) !!}
                                        </div>
                                        <div class="col-12 col-md-3 align-self-end">
                                            {!! Form::label('filterEndDate', 'Tanggal Selesai', []) !!}
                                            {!! Form::text('tgl_selesai', null, ['class' => 'form-control date-picker', 'id' => 'filterEndDate']) !!}
                                        </div>
                                        <div class="col-12 col-md-3 d-flex align-items-end">
                                            <button class="btn btn-primary">Filter Data</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        @endif

                    </div>
                    <div class="px-3">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                    </div>
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
@push('scripts')
    <script type="text/javascript" src="{{ asset('plugin/flatpickr/flatpickr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('plugin/flatpickr/lang/id.js') }}"></script>
    <script>
        const startDate = flatpickr('#filterStartDate', {
            'locale': 'id',
            'altInput': true,
            'altFormat': 'j F, Y',
            'dateFormat': 'Y-m-d',
            onChange: function(selectedDates, dateStr, instance) {
                endDate.set('minDate', dateStr)
            }
        })

        const endDate = flatpickr('#filterEndDate', {
            'locale': 'id',
            'altInput': true,
            'altFormat': 'j F, Y',
            'dateFormat': 'Y-m-d',
        })
        
    </script>

    <script>
        const filterForm = document.getElementById('filterForm')
        filterForm.addEventListener('submit', (event) => {
            event.preventDefault()
            const formData = new FormData(event.target)
            const searchParams = new URLSearchParams(formData)
            console.log(url + `?${searchParams.toString()}`);
            $('#PenilaianDataTable').DataTable().ajax.url(url + `?${searchParams.toString()}`).load();
        })
    </script>
@endpush
