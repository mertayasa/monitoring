{{-- <h4>Penilai : {{ $penilai->nama }}</h4> --}}
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('pgwKontrak', 'Pegawai Kontrak <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::select('id_pgw_kontrak', $pgw_kontrak, null, ['class' => 'form-control', 'id' => 'pgwKontrak']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('penilai', 'Pejabat Penilai <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::select('id_penilai', $penilai, null, ['class' => 'form-control', 'id' => 'penilai']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('durasi_penilaian', 'Durasi Penilaian <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::select('durasi_penilaian', [
            1 => '1 Januari '.date('Y').' - '.'30 Juni '.date('Y'),
            2 => '1 Juli '.date('Y').' - '.'31 Desember '.date('Y'),
        ], str_contains($nilai_skp->tgl_mulai_penilaian, '01-01') ? 1 : 2, ['class' => 'form-control', 'id' => 'durasi_penilaian']) !!}
    </div>
</div>

{{-- <div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tglMulaiPenilaian', 'Tanggal Mulai Penilaian <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::date('tgl_mulai_penilaian', null, ['class' => 'form-control', 'id' => 'tglMulaiPenilaian']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tglSelesaiPenilaian', 'Tanggal Selesai Penilaian <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
        {!! Form::date('tgl_selesai_penilaian', null, ['class' => 'form-control', 'id' => 'tglSelesaiPenilaian']) !!}
    </div>
</div> --}}
