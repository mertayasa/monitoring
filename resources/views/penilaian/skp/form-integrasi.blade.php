<div>
    <div class="dp-3 text-center">
        <p>INTEGRASI HASIL PENILAIAN KINERJA PEGAWAI KONTRAK TAHUN 2021</p>
    </div>

    <br>
    <table class="table table-bordered" style="color: black; border-color:black">

        <tr>
            <th colspan="2" style="text-align: center">PEGAWAI YANG DINILAI</th>
            <th colspan="2" style="text-align: center">PEJABAT PENILAI KINERJA</th>
        </tr>
        <tr>
            <td>Nama</td>
            <td>{{ $nilai_skp->pgwKontrak->nama }}</td>
            <td>Nama</td>
            <td>{{ $nilai_skp->penilai->nama }}</td>
        </tr>
        <tr>
            <td>No Kontrak</td>
            <td>{{ $nilai_skp->pgwKontrak->no_kontrak }}</td>
            <td>NIP</td>
            <td>{{ $nilai_skp->penilai->nip }}</td>
        </tr>
        <tr>
            <td>Pangkat/Golongan</td>
            <td>{{ $nilai_skp->pgwKontrak->pangkatGolongan->nama }}</td>
            <td>Pangkat/Golongan</td>
            <td>{{ $nilai_skp->penilai->pangkatGolongan->nama }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>{{ $nilai_skp->pgwKontrak->jabatan->nama }}</td>
            <td>Jabatan</td>
            <td>{{ $nilai_skp->penilai->jabatan->nama }}</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>{{ $nilai_skp->pgwKontrak->unitKerja->nama }}</td>
            <td>Unit Kerja</td>
            <td>{{ $nilai_skp->penilai->unitKerja->nama }}</td>
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
                Pegawai Kontrak Yang Dinilai
                <br><br><br><br><br>
                {{ $nilai_skp->pgwKontrak->nama }} <br>
                No Kontrak. {{ $nilai_skp->pgwKontrak->nip }}<br>
            </td>
            <td style="width: 500px"></td>
            <td style="width: 300px">
                Denpasar, {{ \Carbon\Carbon::now()->isoFormat('LL') }} <br>
                Pejabat Penilai
                <br><br><br><br><br>
                {{ $nilai_skp->penilai->nama }} <br>
                Nip. {{ $nilai_skp->penilai->nip }}
            </td>
            <td style="width: 100px"></td>
        </tr>
    </table>

</div>
