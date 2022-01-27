@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Pangkat Golongan</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=" mb-0 ">Edit Pangkat Golongan</h4>
                    </div>
                    <div class="card-body pt-0">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::model($pangkat_golongan, ['route' => ['pangkat_golongan.update', $pangkat_golongan->id], 'method' => 'patch']) !!}
                        @include('pangkat_golongan.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('pangkat_golongan.index') }}" class="btn btn-danger">Kembali</a>
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
