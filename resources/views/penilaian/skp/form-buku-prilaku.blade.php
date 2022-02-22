<div>
    <div class="dp-3 text-center">
        <p>BUKU CATATAN PENILAIAN PERILAKU PEGAWAI KONTRAK</p>
    </div>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $nilai_skp->pgwKontrak->nama }}</td>
        </tr>
        <tr>
            <td>No Kontrak</td>
            <td>:</td>
            <td>{{ $nilai_skp->pgwKontrak->no_kontrak }}</td>
        </tr>
    </table>
    <br>
    <table class="table table-bordered" style="color: black; border-color:black">
        <tr style="text-align: center">
            <td>No</td>
            <td>Tanggal</td>
            <td colspan="4">Uraian</td>
            <td>Nama/NIP dan Paraf Pejabat Penilai</td>
        </tr>
        <tr style="text-align: center">
            <td>1</td>
            <td>2</td>
            <td colspan="4">3</td>
            <td>4</td>
        </tr>
        <tr>
            <td rowspan="12"></td>
            <td> {{ indonesianDate($nilai_skp->tgl_mulai_penilaian) }} s/d
                {{ indonesianDate($nilai_skp->tgl_selesai_penilaian) }}</td>
            <td>Penilaian SKP {{ indonesianDate($nilai_skp->tgl_mulai_penilaian) }} s/d
                {{ indonesianDate($nilai_skp->tgl_selesai_penilaian) }}</td>
            <td></td>
            <td></td>
            <td> {{ $nilai_skp->nilai }} </td>
            <td rowspan="12" style="text-align: center;"> <br>
                PEJABAT PENILAI
                <br><br><br><br><br>
                {{ $nilai_skp->penilai->nama }} <br>
                NIP. {{ $nilai_skp->penilai->nip }}
            </td>
        </tr>
        <tr></tr>
        <tr>
            <td rowspan="10"></td>
            <td colspan="3">Sedangkan penilaian prilaku kerjanya adalah </td>
            <td></td>

        </tr>
        <tr>
            <td colspan="3">Sebagai berikut:</td>
            <td></td>

        </tr>
        <tr>
            <td>Orientasi Pelayanan</td>
            <td>=</td>
            <td>{{ $nilai_prilaku->orientasi_pelayanan }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->orientasi_pelayanan) }} )</td>

        </tr>
        <tr>
            <td>Integritas</td>
            <td>=</td>
            <td>{{ $nilai_prilaku->integritas }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->integritas) }} )</td>

        </tr>
        <tr>
            <td>Komitmen</td>
            <td>=</td>
            <td>{{ $nilai_prilaku->komitmen }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->komitmen) }} )</td>

        </tr>
        <tr>
            <td>Disiplin</td>
            <td>=</td>
            <td>{{ $nilai_prilaku->disiplin }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->disiplin) }} )</td>

        </tr>
        <tr>
            <td>Kerjasama</td>
            <td>=</td>
            <td>{{ $nilai_prilaku->kerjasama }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->kerjasama) }} )</td>

        </tr>
        <tr>
            <td>Kepemimpinan</td>
            <td>=</td>
            <td>{{ $nilai_prilaku->kepemimpinan }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->kepemimpinan) }} )</td>

        </tr>
        <tr>
            <td>Jumlah</td>
            <td>=</td>
            <td>{{ $nilai_prilaku->total_nilai }}</td>
            <td></td>

        </tr>
        <tr>
            <td>Nilai Rata-rata</td>
            <td>=</td>
            <td>{{ round($nilai_prilaku->nilai_rata, 2) }}</td>
            <td>( {{ getPredikatNilai(round($nilai_prilaku->nilai_rata, 2)) }} )</td>

        </tr>


    </table>

</div>
