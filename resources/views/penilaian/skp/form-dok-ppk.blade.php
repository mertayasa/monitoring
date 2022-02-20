<div>
    <div class="dp-3 text-center">
        <p>LAPORAN DOKUMEN PENILAI KINERJA</p>
    </div>

    <br>
    <table class="table table-bordered" style="color: black; border-color:black">

        <tr>
            <td style="width: 10px" rowspan="6">1</td>
            <th colspan="3">PEGAWAI YANG DINILAI</th>
        </tr>
        <tr>
            <td style="width: 300px">NAMA</td>
            <td>:</td>
            <td>{{ $nilai_skp->pgwKontrak->nama }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $nilai_skp->pgwKontrak->no_kontrak }}</td>
        </tr>
        <tr>
            <td>PANGKAT/GOL RUANG</td>
            <td>:</td>
            <td>{{ $nilai_skp->pgwKontrak->pangkatGolongan->nama }}</td>
        </tr>
        <tr>
            <td>JABATAN</td>
            <td>:</td>
            <td>{{ $nilai_skp->pgwKontrak->jabatan->nama }}</td>
        </tr>
        <tr>
            <td>UNIT KERJA</td>
            <td>:</td>
            <td>{{ $nilai_skp->pgwKontrak->unitKerja->nama }}</td>
        </tr>

        <tr>
            <td style="width: 10px" rowspan="6">2</td>
            <th colspan="3">PEJABAT PENILAI KINERJA</th>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td>{{ $nilai_skp->penilai->nama }}</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>{{ $nilai_skp->penilai->nip }}</td>
        </tr>
        <tr>
            <td>PANGKAT/GOL RUANG</td>
            <td>:</td>
            <td>{{ $nilai_skp->penilai->pangkatGolongan->nama }}</td>
        </tr>
        <tr>
            <td>JABATAN</td>
            <td>:</td>
            <td>{{ $nilai_skp->penilai->jabatan->nama }}</td>
        </tr>
        <tr>
            <td>UNIT KERJA</td>
            <td>:</td>
            <td></td>
        </tr>

        <tr>
            <td style="width: 10px" rowspan="6">3</td>
            <th colspan="3">ATASAN PEJABAT PENILAI KINERJA</th>
        </tr>
        <tr>
            <td>NAMA</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>PANGKAT/GOL RUANG</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>JABATAN</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>UNIT KERJA</td>
            <td>:</td>
            <td>..</td>
        </tr>

        <tr>
            <td style="width: 10px" rowspan="8">4</td>
            <th colspan="3">PENILAIAN KINERJA</th>
        </tr>
        <tr>
            <td>NILAI SKP</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>NILAI PERILAKU KERJA</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>NILAI SKP + PERILAKU KERJA</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>IDE BARU</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>NILAI KINERJA PEGAWAI</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td>PREDIKAT KINERJA PEGAWAI</td>
            <td>:</td>
            <td>(..)</td>
        </tr>
        <tr>
            <td>TOTAL ANGKA KREDIT YANG DIPEROLEH (BAGI PEJABAT FUNGSIONAL)</td>
            <td>:</td>
            <td>..</td>
        </tr>
        <tr>
            <td style="width: 10px" rowspan="2">5</td>
            <td colspan="3">PERMASALAHAN</td>
        </tr>
        <tr>
            <td colspan="3">{{ $nilai_skp->permasalahan }}</td>
        </tr>
        <tr>
            <td style="width: 10px" rowspan="2">6</td>
            <td colspan="3">REKOMENDASI</td>
        </tr>
        <tr>
            <td colspan="3">{{ $nilai_skp->rekomendasi }}</td>
        </tr>
        <tr>
            <td style="width: 10px" rowspan="2">7</td>
            <td colspan="3">KEBERATAN</td>
        </tr>
        <tr>
            <td colspan="3">{{ $nilai_skp->keberatan }}</td>
        </tr>
        <tr>
            <td style="width: 10px" rowspan="2">8</td>
            <td colspan="3">PENJELASAN PEJABAT PENILAI ATAS KEBERATAN</td>
        </tr>
        <tr>
            <td colspan="3">{{ $nilai_skp->penjelasan_penilai }}</td>
        </tr>
        <tr>
            <td style="width: 10px" rowspan="2">9</td>
            <td colspan="3">KEPUTUSAN ATAS PEJABAT PENILAI KINERJA</td>
        </tr>
        <tr>
            <td colspan="3">{{ $nilai_skp->keputusan_atasan }}</td>
        </tr>
    </table>
    <br>
    <table style="border:none;">
        <tr style="border:none;">
            <td style="width: 200px"></td>
            <td style="width: 200px">
                <br>
                10. Denpasar, <br>
                Pegawai Kontrak Yang Dinilai
                <br><br><br><br><br>
                {{ $nilai_skp->pgwKontrak->nama }} <br>
                No Kontrak. {{ $nilai_skp->pgwKontrak->nip }}<br>
            </td>
            <td style="width: 500px"></td>
            <td style="width: 300px">
                <br>
                11. Denpasar, <br>
                Pejabat Penilai
                <br><br><br><br><br>
                {{ $nilai_skp->penilai->nama }} <br>
                Nip. {{ $nilai_skp->penilai->nip }}
            </td>
            <td style="width: 100px"></td>
        </tr>
    </table>
    <br>
    <table style="border:none;">
        <tr style="border:none;">
            <td style="width: 200px"></td>
            <td style="width: 200px">
            </td>
            <td style="width: 500px; text-align:center">
                <br>
                12. Denpasar, <br>
                Atasan Pejabat Penilai Kinerja
                <br><br><br><br><br>
                Nama
                Nama <br>
                NIP.
            </td>
            <td style="width: 300px">
            </td>
            <td style="width: 100px"></td>
        </tr>
    </table>

</div>
