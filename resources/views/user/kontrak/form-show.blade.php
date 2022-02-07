<div class="row">
    <div class="col-12 col-md-4">
        <img src="{{ $user->getFoto() }}" alt="">
    </div>
    
    <div class="col-12 col-md-8">
        <h2 class="sn-judul">{{ $user->nama }}</h2>
            <table class="table table-borderless">
                <tr>
                    <td>No Kontrak</td>
                    <td>: {{$user->no_kontrak ?? '-'}}</td>
                </tr>
                <tr>
                    <td>Unit Kerja</td>
                    <td>: {{$user->unitKerja->nama ?? '-'}}</td>
                </tr>
                <tr>
                    <td>Tanggal Mulai Kontrak</td>
                    <td>: {{$user->getTglMulaiKontrak()}}</td>
                </tr>
                <tr>
                    <td>Tanggal Selesai Kontrak</td>
                    <td>: {{$user->getTglSelesaiKontrak()}}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td>: {{$user->tempat_lahir}}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>: {{$user->getTglLahir()}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>: {{$user->jenis_kelamin}}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>: {{$user->email}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{$user->alamat}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>: {{$user->getStatus()}}</td>
                </tr>

        </table>
    </div>
</div>

