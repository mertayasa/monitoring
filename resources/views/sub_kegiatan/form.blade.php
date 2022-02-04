<div class="row">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('complaintType', 'Nama Kegiatan ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_kegiatan', $kegiatan, null, ['class' => 'form-control', 'id' => 'complaintType', 'disabled' => isset($disabled) ? true : false]) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('jabatan', 'Nama Sub Kegiatan', ['class' => 'mb-1']) !!}
        {!! Form::text('nama_sub', null, ['class' => 'form-control', 'id' => 'jabatan']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('jabatan', 'tanggal Mulai Kegiatan', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_mulai_kegiatan', null, ['class' => 'form-control', 'id' => 'jabatan']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12  pb-3 pb-md-0">
        {!! Form::label('jabatan', 'tanggal Selesai Kegiatan', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_selesai_kegiatan', null, ['class' => 'form-control', 'id' => 'jabatan']) !!}
    </div>
</div>
