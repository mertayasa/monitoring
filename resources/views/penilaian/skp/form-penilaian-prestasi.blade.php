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
            <td>{{ $nilai_skp->penilai->nama }}</td>
            <td>Nama</td>
            <td>{{ $nilai_skp->pgwKontrak->nama }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>{{ $nilai_skp->penilai->nip }}</td>
            <td>No Kontrak</td>
            <td>{{ $nilai_skp->pgwKontrak->no_kontrak }}</td>
        </tr>
        <tr>
            <td>Pangkat/Golongan</td>
            <td>{{ $nilai_skp->penilai->pangkatGolongan->nama }}</td>
            <td>Pangkat/Golongan</td>
            <td>{{ $nilai_skp->pgwKontrak->pangkatGolongan->nama }}</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>{{ $nilai_skp->penilai->jabatan->nama }}</td>
            <td>Jabatan</td>
            <td>{{ $nilai_skp->pgwKontrak->jabatan->nama }}</td>
        </tr>
        <tr>
            <td>Unit Kerja</td>
            <td>{{ $nilai_skp->penilai->unitKerja->nama }}</td>
            <td>Unit Kerja</td>
            <td>{{ $nilai_skp->pgwKontrak->unitKerja->nama }}</td>
        </tr>
        <tr>
            <td>Tanggal Penilaian</td>
            <td colspan="3">{{ indonesianDate($nilai_skp->tgl_selesai_penilaian) }}</td>
        </tr>

        <tr>
            <th colspan="2">UNSUR YANG DINILAI</th>
            <th colspan="2">NILAI</th>
        </tr>
        <tr>
            <td colspan="2">a. Sasaran Kerja Pegawai (SKP)</td>
            <td colspan="2"> {{ $nilai_skp->nilai }} </td>
        </tr>
        <tr>
            <td colspan="2">b. Perilaku Kerja Pegawai</td>
            <td colspan="2"> {{ $nilai_prilaku->total_nilai }} </td>
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
                {{ $nilai_skp->penilai->nama }} <br>
                Nip. {{ $nilai_skp->penilai->nip }}
            </td>
            <td style="width: 500px"></td>
            <td style="width: 300px">
                Denpasar, {{ \Carbon\Carbon::now()->isoFormat('LL') }} <br>
                Pegawai Kontrak Yang Dinilai
                <br><br><br><br><br>
                {{ $nilai_skp->pgwKontrak->nama }} <br>
                No Kontrak. {{ $nilai_skp->pgwKontrak->nip }}<br>
            </td>
            <td style="width: 100px"></td>
        </tr>
    </table>

</div>
