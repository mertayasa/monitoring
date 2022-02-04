@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Sub Kegiatan</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sub Kegiatan Baru</h5>
                    </div>
                    <div class="card-body pt-0">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::open(['route' => 'sub_kegiatan.store']) !!}
                        @include('sub_kegiatan.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('sub_kegiatan.index') }}" class="btn btn-danger">Kembali</a>
                                <button class="btn btn-primary ml-3" type="submit">Simpan</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
