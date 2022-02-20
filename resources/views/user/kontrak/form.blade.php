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

<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tempatLahir', 'Tempat Lahir', ['class' => 'mb-1']) !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempatLahir']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tanggalLahir', 'Tanggal Lahir', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_lahir', null, ['class' => 'form-control', 'id' => 'tanggalLahir']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('no_telp', 'No Handphone', ['class' => 'mb-1']) !!}
        <div class="input-group mb-2 mr-sm-2">
            <div class="input-group-prepend">
              <div class="input-group-text">+62</div>
            </div>
            {!! Form::text('no_tlp', null, ['class' => 'form-control number-only', 'id' => 'no_telp']) !!}
        </div>     
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('no_kontrak', 'No Kontrak', ['class' => 'mb-1']) !!}
        {!! Form::text('no_kontrak', null, ['class' => 'form-control', 'id' => 'no_kontrak']) !!}  
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tglMulaiKontrak', 'Tanggal Mulai Kontrak', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_mulai_kontrak', null, ['class' => 'form-control', 'id' => 'tglMulaiKontrak']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tglSelesaiKontrak', 'Tanggal Selesai Kontrak', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_selesai_kontrak', null, ['class' => 'form-control', 'id' => 'tglSelesaiKontrak']) !!}
        <small>Kosongkan apabila belum ditentukan</small>
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('idUnitKerja', 'Unit Kerja', ['class' => 'mb-1']) !!}
        {!! Form::select('id_unit_kerja', $unit_kerja, null, ['class' => 'form-control', 'id' => 'idUnitKerja']) !!}  
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('jenisKelamin', 'Jenis Kelamin', ['class' => 'mb-1']) !!}
        {!! Form::select('jenis_kelamin', ['' => 'Pilih Jenis Kelamin', 'Laki-laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'], null, ['class' => 'form-control', 'id' => 'jenisKelamin']) !!}  
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('status', 'Status', ['class' => 'mb-1']) !!}
        {!! Form::select('status', ['' => 'Pilih Status', 'aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'], null, ['class' => 'form-control', 'id' => 'status']) !!}  
    </div>
</div>
@include('layouts.form_password')
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('alamat', 'Alamat', ['class' => 'mb-1']) !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamat', 'style' => 'height:150px']) !!}  
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('filePondUpload', 'Foto', ['class' => 'mb-1']) !!}
        {!! Form::file('foto', ['class' => 'd-block filepond', 'id' => 'filePondUpload', 'data-foto' => isset($user) && $user->foto != '' ? $user->getFoto() : '']) !!}
        <span> <i> Format yang didukung : .png .jpg .jpeg </i> </span> <br>
        <span> <i> Ukuran maksimal : 2MB </i> </span>
    </div>
</div>
@include('layouts.form_upload_image')