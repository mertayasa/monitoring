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
                        <li class="breadcrumb-item"><a href="#">Sistem Informasi Akademik</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
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
                                    <h5 class="card-title text-white mb-4">Total Siswa</h5>
                                    <h1 class="mt-1 mb-3 text-white">3</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Guru</h5>
                                    <h1 class="mt-1 mb-3 text-white">3</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Orang Tua</h5>
                                    <h1 class="mt-1 mb-3 text-white">3</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Mata Pelajaran</h5>
                                    <h1 class="mt-1 mb-3 text-white">3</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title  text-white mb-4">Total Ekstrakulikuler</h5>
                                    <h1 class="mt-1 mb-3 text-white">3</h1>
                                    <div class="mb-1 detail justify-content-end">
                                        <a href="">Lihat Detail <i
                                                class="fas fa-angle-double-right"></i></a>
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