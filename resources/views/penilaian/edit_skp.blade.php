@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Edit SKP</h1>

        TML
<!-- Horizontal Steppers -->
<div class="row">
  <div class="col-md-12">

    <!-- Stepers Wrapper -->
    <ul class="stepper stepper-horizontal">

      <!-- First Step -->
      <li class="completed">
        <a href="#!">
          <span class="circle">1</span>
          <span class="label">First step</span>
        </a>
      </li>

      <!-- Second Step -->
      <li class="active">
        <a href="#!">
          <span class="circle">2</span>
          <span class="label">Second step</span>
        </a>
      </li>

      <!-- Third Step -->
      <li class="warning">
        <a href="#!">
          <span class="circle"><i class="fas fa-exclamation"></i></span>
          <span class="label">Third step</span>
        </a>
      </li>

    </ul>
    <!-- /.Stepers Wrapper -->

  </div>
</div>
<!-- /.Horizontal Steppers -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class=" mb-0 ">Edit SKP</h4>
                    </div>
                    <div class="card-body pt-0">
                        @include('layouts.flash')
                        @include('layouts.error_message')
                        {!! Form::open(['route' => ['penilaian.update_skp', $nilai_skp->id], 'method' => 'patch']) !!}
                            @include('penilaian.form-skp')
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="{{ route('penilaian.edit', $nilai_skp->id) }}" class="btn btn-danger">Kembali</a>
                                    <button class="btn btn-primary ml-3" type="submit">Simpan & Lanjut</button>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
