<div>
    <div class="dp-3 text-center">
        <p>INTEGRASI HASIL PENILAIAN KINERJA PEGAWAI KONTRAK TAHUN 2021</p>
    </div>

    <br>
    <table class="table table-bordered" style="color: black; border-color:black">

        <tr>
            <th colspan="2">PEGAWAI YANG DINILAI</th>
            <th colspan="2">PEJABAT PENILAI KINERJA</th>
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
        <tr>
            <td>Tanggal Penilaian</td>
            <td colspan="3">..</td>
        </tr>
        <tr>
            <td colspan="4" style="text-align: center">INTEGRASI HASIL PENILAIAN KINERJA PEGAWAI KONTRAK 2021</td>
        </tr>
        <tr>
            <th colspan="2">PERIODE </th>
            <th colspan="2">NILAI KINERJA PEGAWAI KONTRAK</th>
        </tr>
        <tr>
            <td colspan="2">Januari - Juni</td>
            <td colspan="2">..</td>
        </tr>
        <tr>
            <td colspan="2">Juli - Desember</td>
            <td colspan="2">..</td>
        </tr>
        <tr>
            <td colspan="2">NILAI KINERJA PEGAWAI KONTRAK TAHUN 2021</td>
            <td colspan="2">..</td>
        </tr>
        <tr>
            <td colspan="2">PREDIKAT</td>
            <td colspan="2">(..)</td>
        </tr>
    </table>
    <br>
    <table style="border:none;">
        <tr style="border:none;">
            <td style="width: 100px"></td>
            <td style="width: 200px">
                <br>
                <br>
                Pegawai yang dinilai
                <br><br><br><br><br>
                Nama <br>
                N0 Kontrak.
            </td>
            <td style="width: 500px"></td>
            <td style="width: 300px">
                Denpasar, {{ \Carbon\Carbon::now()->isoFormat('LL') }} <br>
                Pejabat Penilai Kinerja
                <br><br><br><br><br>
                {{ Auth::user()->name }}
                Nama <br>
                NIP.
            </td>
            <td style="width: 100px"></td>
        </tr>
    </table>

</div>
