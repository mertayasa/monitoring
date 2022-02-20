<div>
    <div class="dp-3 text-center">
        <p>PENILAIAN PERILAKU KERJA</p>
    </div>

    <br>
    <p> Periode Penilaian: ... s/d ... </p>
    <table class="table table-bordered" style="color: black; border-color:black">
        <tr>
            <th colspan="2" style="text-align: center">PEGAWAI YANG DINILAI</th>
            <th colspan="2" style="text-align: center">PEJABAT PENILAI KINERJA</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td>...</td>
            <td>Nama</td>
            <td>..</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>...</td>
            <td>NIP</td>
            <td>..</td>
        </tr>
        <tr>
            <td>Pangkat/Golongan</td>
            <td>...</td>
            <td>Pangkat/Golongan</td>
            <td>..</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>...</td>
            <td>Jabatan</td>
            <td>..</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>...</td>
            <td>Unit Kerja</td>
            <td>..</td>
        </tr>

    </table>
    <table class="table table-bordered" style="margin-top: -10px">
        <tr>
            <th>No</th>
            <th>ASPEK PERILAKU</th>
            <th>NILAI</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Orientasi Pelayanan</td>
            <td>...</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Inisiatif Kerja</td>
            <td>...</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Komitmen</td>
            <td>...</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kerjasama</td>
            <td>...</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kepemimpinan</td>
            <td>...</td>
        </tr>
        <tr>
            <td colspan="2">Nilai Akhir</td>
            <td>..</td>
        </tr>
    </table>
    <br>
    <table style="border:none;">
        <tr style="border:none;">
            <td style="width: 100px"></td>
            <td style="width: 200px">

            </td>
            <td style="width: 500px"></td>
            <td style="width: 300px">
                Denpasar, {{ \Carbon\Carbon::now()->isoFormat('LL') }} <br>
                Pegawai Kontrak Yang Dinilai
                <br><br><br><br><br>
                {{ Auth::user()->name }}
                Nama <br>
                No Kontrak.
            </td>
            <td style="width: 100px"></td>
        </tr>
    </table>

</div>
