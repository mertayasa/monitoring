{!! Form::hidden('id_nilai_skp', $nilai_skp->id, []) !!}
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('nilai', 'Nilai SKP <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::text('nilai', null, ['class' => 'form-control number-only', 'id' => 'nilai']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('permasalahan', 'Permasalahan', ['class' => 'mb-1'], false) !!}
        {!! Form::textarea('permasalahan', null, ['class' => 'form-control', 'id' => 'permasalahan']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('keberatan', 'Keberatan', ['class' => 'mb-1'], false) !!}
        {!! Form::textarea('keberatan', null, ['class' => 'form-control', 'id' => 'keberatan']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('rekomendasi', 'Rekomendasi', ['class' => 'mb-1'], false) !!}
        {!! Form::textarea('rekomendasi', null, ['class' => 'form-control', 'id' => 'rekomendasi']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('penjelasanPenilai', 'Penjelasan Penilai', ['class' => 'mb-1'], false) !!}
        {!! Form::textarea('penjelasan_penilai', null, ['class' => 'form-control', 'id' => 'penjelasanPenilai']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('keputusanAtasan', 'Keputusan Atasan', ['class' => 'mb-1'], false) !!}
        {!! Form::textarea('keputusan_atasan', null, ['class' => 'form-control', 'id' => 'keputusanAtasan']) !!}
    </div>
</div>
