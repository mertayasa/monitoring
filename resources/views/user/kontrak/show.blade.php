@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        {{-- <h1 class="h3 mb-3">Detail Pengumuman</h1> --}}

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Pegawai Kontrak</h5>
                    </div>
                    <div class="card-body pt-0">
                        @include('user.'.$level.'.form-show')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('user.index', $level) }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
