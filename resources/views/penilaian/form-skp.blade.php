@forelse ($target_skp as $target)
    <p>asdas</p>
    {{-- <div class="row mt-3">
        <div class="col-12 col-md-6 pb-3 pb-md-0">
            {!! Form::label('pgwKontrak', 'Pegawai Kontrak', ['class' => 'mb-1']) !!}
            {!! Form::select('id_pgw_kontrak', $pgw_kontrak, null, ['class' => 'form-control', 'id' => 'pgwKontrak']) !!}
        </div>
    </div> --}}
@empty
    <div class="text-center">
        Pegawai belum memiliki nilai target SKP <button type="button" class="btn btn-sm btn-primary"
            data-bs-toggle="modal"
            data-bs-target="#skpModal" 
            data-bs-toggle="tooltip" 
            data-bs-placement="bottom" 
            title="Tambah Nilai SKP"
            onclick="showFormAdd(this)">
            <i class="fas fa-folder-plus"></i> Tambah Nilai SKP</button>
    </div>
@endforelse

<div class="modal fade" id="skpModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="skpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skpModalLabel">Anggota Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route' => 'penilaian.store_skp', 'id' => 'formskp']) !!}
                <div class="row">
                    {!! Form::hidden('id_durasi_nilai', $durasi_penilaian->id, []) !!}
                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('kegiatanSKP', 'Kegiatan SKP', ['class' => 'mb-1']) !!}
                        {!! Form::text('kegiatan', null, ['class' => 'form-control', 'id' => 'kegiatanSKP']) !!}
                        <div class="invalid-feedback" error-name="kegiatan">
                        </div>
                    </div>
                    
                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('kuantitasSKP', 'Kuantitas', ['class' => 'mb-1']) !!}
                        {!! Form::text('kuantitas', null, ['class' => 'form-control number-only', 'id' => 'kuantitasSKP']) !!}
                        <div class="invalid-feedback" error-name="kuantitas">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('outputSKP', 'Output', ['class' => 'mb-1']) !!}
                        {!! Form::text('output', null, ['class' => 'form-control', 'id' => 'outputSKP']) !!}
                        <div class="invalid-feedback" error-name="output">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('kualitasSKP', 'Kualitas', ['class' => 'mb-1']) !!}
                        {!! Form::text('kualitas', null, ['class' => 'form-control', 'id' => 'kualitasSKP']) !!}
                        <div class="invalid-feedback" error-name="kualitas">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('biayaSKP', 'Biaya', ['class' => 'mb-1']) !!}
                        {!! Form::text('biaya', null, ['class' => 'form-control number-only', 'id' => 'biayaSKP']) !!}
                        <div class="invalid-feedback" error-name="biaya">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('nilaiSKP', 'Nilai', ['class' => 'mb-1']) !!}
                        {!! Form::text('nilai', null, ['class' => 'form-control number-only', 'id' => 'nilaiSKP']) !!}
                        <div class="invalid-feedback" error-name="nilai">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('totalSKP', 'Total', ['class' => 'mb-1']) !!}
                        {!! Form::text('total', null, ['class' => 'form-control number-only', 'id' => 'totalSKP']) !!}
                        <div class="invalid-feedback" error-name="total">
                        </div>
                    </div>

                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary d-none" id="btnStoreJadwal">Simpan</button>
                <button type="button" class="btn btn-primary d-none" id="btnUpdateJadwal">Update</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function showFormAdd(){
            console.log('asdasd');
        }
    </script>
@endpush