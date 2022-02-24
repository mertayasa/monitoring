<div>
    <div class="dp-3 text-center">
        <p>PENILAIAN PERILAKU KERJA</p>
    </div>

    <br>
    <p> Periode Penilaian: {{ indonesianDate($nilai_skp->tgl_mulai_penilaian) }} s/d
        {{ indonesianDate($nilai_skp->tgl_selesai_penilaian) }} </p>
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
            <td>100</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Inisiatif Kerja</td>
            <td>100</td>
        </tr>
        <tr>
            <td>3</td>
            <td>Komitmen</td>
            <td>100</td>
        </tr>
        <tr>
            <td>4</td>
            <td>Kerjasama</td>
            <td>100</td>
        </tr>
        <tr>
            <td>5</td>
            <td>Kepemimpinan</td>
            <td>100</td>
        </tr>
        <tr>
            <td colspan="2"><b> Nilai Akhir </b>
            </td>
            <td><b> 100 </b>
            </td>
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
                Denpasar, {{ indonesianDate($nilai_skp->tgl_selesai_penilaian) }} <br>
                Pejabat Penilai Kinerja
                <br><br><br><br><br>
                {{ $nilai_skp->penilai->nama }} <br>
                Nip. {{ $nilai_skp->penilai->nip }}
            </td>
            <td style="width: 100px"></td>
        </tr>
    </table>

</div>
