@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        @include('penilaian.stepper', ['is_active' => 4])

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class=" mb-0 ">Nilai SKP</h5>
                    </div>
                    <div class="card-body pt-0">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::model($nilai_skp, ['route' => ['penilaian.update_nilai', $nilai_skp->id], 'method' => 'patch']) !!}
                        @include('penilaian.form-nilai')
                        <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('penilaian.edit_prilaku', $nilai_skp->id) }}" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Edit Nilai Perilaku</a>
                                <button class="btn btn-primary ml-3" type="submit">Simpan Nilai <i class="fas fa-arrow-right"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
