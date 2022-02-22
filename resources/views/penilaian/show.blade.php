@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Penilaian SKP</h5>
                    </div>
                    <div class="card-body pt-0 " style="color: black;">
                        @include('penilaian.skp.form-cover')
                        <hr class="m-5">
                        @include('penilaian.skp.form-dp3skp')
                        <hr class="m-5">
                        @include('penilaian.skp.form-buku-prilaku')
                        <hr class="m-5">
                        @include('penilaian.skp.form-ppk')
                        <hr class="m-5">
                        @include('penilaian.skp.form-penilaian-prestasi')
                        <hr class="m-5">
                        @include('penilaian.skp.form-penilaian-perilaku')
                        <hr class="m-5">
                        @include('penilaian.skp.form-integrasi')
                        <hr class="m-5">
                        {{-- @include('penilaian.skp.form-dok-ppk') --}}
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('penilaian.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
