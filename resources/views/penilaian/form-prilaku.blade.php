{!! Form::hidden('id_nilai_skp', $nilai_skp->id, []) !!}
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('orientasiPelayanan', 'Orientasi Pelayanan <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::text('orientasi_pelayanan', $nilai_prilaku->orientasi_pelayanan ?? '', ['class' => 'form-control number-only', 'id' => 'orientasiPelayanan']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('integritas', 'Integritas <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::text('integritas', $nilai_prilaku->integritas ?? '', ['class' => 'form-control number-only', 'id' => 'integritas']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('komitmen', 'Komitmen <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::text('komitmen', $nilai_prilaku->komitmen ?? '', ['class' => 'form-control number-only', 'id' => 'komitmen']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('disiplin', 'Disiplin <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::text('disiplin', $nilai_prilaku->disiplin ?? '', ['class' => 'form-control number-only', 'id' => 'disiplin']) !!}
    </div>
</div>
