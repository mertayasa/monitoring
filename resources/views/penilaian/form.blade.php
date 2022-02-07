<h4>Penilai : {{ $penilai->nama }}</h4>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('pgwKontrak', 'Pegawai Kontrak', ['class' => 'mb-1']) !!}
        {!! Form::select('id_pgw_kontrak', $pgw_kontrak, null, ['class' => 'form-control', 'id' => 'pgwKontrak']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tglMulaiPenilaian', 'Tanggal Mulai Penilaian', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_mulai_penilaian', null, ['class' => 'form-control', 'id' => 'tglMulaiPenilaian']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tglSelesaiPenilaian', 'Tanggal Selesai Penilaian', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_selesai_penilaian', null, ['class' => 'form-control', 'id' => 'tglSelesaiPenilaian']) !!}
    </div>
</div>
