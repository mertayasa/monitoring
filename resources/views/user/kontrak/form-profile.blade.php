<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('userName', 'Nama', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'userName']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('userEmail', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'userEmail']) !!}
    </div>
</div>

@include('layouts.form_password')