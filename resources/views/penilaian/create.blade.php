@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">
    @include('penilaian.stepper', ['is_active' => 1])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Penilaian Baru</h5>
                </div>
                <div class="card-body pt-0">
                    @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::open(['route' => 'penilaian.store']) !!}
                        @include('penilaian.form')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('penilaian.index') }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                                <button class="btn btn-primary ml-3" type="submit">Simpan & Edit Kegiatan <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

