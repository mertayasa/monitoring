@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Detail Penilaian SKP</h5>
                    </div>
                    <div class="card-body pt-0">
                        @include('penilaian.skp.form-cover')
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
