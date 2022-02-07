@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css" />
@endpush

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3> Dashboard</h3>
            </div>

            <div class="col-auto ml-auto text-right mt-n1">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent p-0 mt-1 mb-0">
                        <li class="breadcrumb-item"><a href="#">Sistem Monitoring</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body ">
                                    <h5 class="card-title text-white mb-4">Total Admin</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['total_admin'] }}</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        @if (Auth::user()->isAdmin())
                                            <a href="{{ route('user.index', 'admin') }}">Lihat Detail <i class="fas fa-angle-double-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Pejabat Penilai</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['total_penilai'] }}</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        @if (Auth::user()->isAdmin())
                                            <a href="{{ route('user.index', 'penilai') }}">Lihat Detail <i class="fas fa-angle-double-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Pegawai Kontrak</h5>
                                    <h1 class="mt-1 mb-3 text-white">{{ $dashboard_data['total_kontrak'] }}</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        @if (Auth::user()->isAdmin())
                                            <a href="{{ route('user.index', 'kontrak') }}">Lihat Detail <i class="fas fa-angle-double-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            @include('dashboard.pengumuman')
        </div>
    </div>
@endsection