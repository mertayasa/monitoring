<div>
    <div class="dp-3 text-center">
        <p>PENILAIAN PRESTASI KERJA PEGAWAI KONTRAK PERIODE ... - ...</p>
    </div>

    <br>
    <table class="table table-bordered" style="color: black; border-color:black">

        <tr>
            <th colspan="2"> PEJABAT PENILAI</th>
            <th colspan="2">PEGAWAI KONTRAK YANG DINILAI</th>
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
            <th colspan="2">UNSUR YANG DINILAI</th>
            <th colspan="2">NILAI</th>
        </tr>
        <tr>
            <td colspan="2">a. Sasaran Kerja Pegawai (SKP)</td>
            <td colspan="2">..</td>
        </tr>
        <tr>
            <td colspan="2">b. Perilaku Kerja Pegawai</td>
            <td colspan="2">..</td>
        </tr>
        <tr>
            <th colspan="2">NILAI PRESTASI KERJA PEGAWAI KONTRAK</th>
            <th colspan="2">..</th>
        </tr>
    </table>
    <br>
    <table style="border:none;">
        <tr style="border:none;">
            <td style="width: 100px"></td>
            <td style="width: 200px">
                <br>
                <br>
                Pejabat Penilai
                <br><br><br><br><br>
                Nama <br>
                NIP
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
