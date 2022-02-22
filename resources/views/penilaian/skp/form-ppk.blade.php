<div>
    <table class="table table-bordered skp" style="color: black; font-size:10px; padding:0; ">
        <tr>
            <td colspan="3" style="text-align:left">8. REKOMENDASI</td>
            <td rowspan="24"></td>
        </tr>
        <tr>
            <td colspan="3" rowspan="4"> {{ $nilai_skp->rekomendasi }}</td>
            <td colspan="3" style="text-align: center"> <img src="{{ asset('admin/img/pancasila-color.png') }}"
                    width="100px">
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center; line-height:15px ">PENILAIAN PRESTASI KERJA <br>
                PEGAWAI KONTRAK</td>
        </tr>
        <tr>
            <td colspan="2"> </td>
            <td>JANGKA WAKTU PENILAIAN</td>
        </tr>
        <tr>
            <td colspan="2">PEMERINTAH KAB. KLUNGKUNG </td>
            <td>Tanggal :{{ indonesianDate($nilai_skp->tgl_mulai_penilaian) }} s/d
                {{ indonesianDate($nilai_skp->tgl_selesai_penilaian) }}</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>9. DIBUAT TANGGAL , .. </td>
            <td>1.</td>
            <td colspan="2"> YANG DINILAI</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>PEJABAT PENILAI</td>
            <td rowspan="5"></td>
            <td> a. Nama</td>
            <td>{{ $nilai_skp->pgwKontrak->nama }}</td>
        </tr>
        <tr>
            <td rowspan="17" style=" line-height: 20px ">
                10. DITERIMA TANGGAL,<br>
                Pegawai Kontrak Yang Dinilai
                <br><br><br><br><br>
                {{ $nilai_skp->pgwKontrak->nama }} <br>
                No Kontrak. {{ $nilai_skp->pgwKontrak->nip }}<br>
            </td>
            <td></td>
            <td rowspan="5" style="line-height: 20px; ">
                <br><br> {{ $nilai_skp->penilai->nama }} <br>
                Nip. {{ $nilai_skp->penilai->nip }}
            </td>
            <td>b. No Kontrak</td>
            <td>{{ $nilai_skp->pgwKontrak->no_kontrak }}</td>
        </tr>
        <tr>
            <td></td>
            <td>c. Pangkat, Golongan Ruang, TMT</td>
            <td> {{ $nilai_skp->pgwKontrak->pangkatGolongan->nama }}</td>
        </tr>
        <tr>
            <td></td>
            <td>d. Jabatan/Pangkat</td>
            <td> {{ $nilai_skp->pgwKontrak->jabatan->nama }}</td>
        </tr>
        <tr>
            <td></td>
            <td>e. Unit Organisasi</td>
            {{-- <td> {{ $nilai_skp->pgwKontrak->unitOrganisasi->nama }}</td> --}}
        </tr>

        <tr>
            <td></td>
            <td>2.</td>
            <td colspan="2"> PEJABAT PENILAI</td>
        </tr>
        <tr>
            <td></td>
            <td rowspan="6"></td>
            <td rowspan="5"></td>
            <td>a. Nama</td>
            <td>{{ $nilai_skp->penilai->nama }}</td>
        </tr>
        <tr>
            <td></td>
            <td>b. NIP</td>
            <td>{{ $nilai_skp->penilai->nip }}</td>
        </tr>
        <tr>
            <td></td>
            <td>c. Pangkat, Golongan Ruang, TMT</td>
            <td>{{ $nilai_skp->penilai->pangkatGolongan->nama }}</td>
        </tr>
        <tr>
            <td></td>
            <td>d. Jabatan/Pangkat</td>
            <td>{{ $nilai_skp->penilai->jabatan->nama }}</td>
        </tr>
        <tr>
            <td></td>
            <td>e. Unit Organisasi</td>
            {{-- <td> {{ $nilai_skp->penilai->unitOrganisasi->nama }}</td> --}}
        </tr>

        <tr>
            <td rowspan="6"></td>
            <td>3.</td>
            <td colspan="2"> 10. DITERIMA TANGGAL,</td>
        </tr>
        <tr>
            <td rowspan="7" style=" line-height: 20px "> ATASAN PEJABAT PENILAI<br>
                <br><br><br>
                nama atasan <br>
                Nip<br>
            </td>
            <td rowspan="5"></td>
            <td>a. Nama</td>
            <td>Ni Kade ...</td>
        </tr>
        <tr>
            <td>b. NIP</td>
            <td>...</td>
        </tr>
        <tr>
            <td>c. Pangkat, Golongan Ruang, TMT</td>
            <td> ...</td>
        </tr>
        <tr>
            <td>d. Jabatan/Pangkat</td>
            <td> ...</td>
        </tr>
        <tr>
            <td>e. Unit Organisasi</td>
            {{-- <td> ...</td> --}}
        </tr>
    </table>

    <br>

    <table class="table table-borderless " style="color: black; font-size:10px; padding:0; ">
        <tr>
            <td colspan="3" style="text-align: center; color:black">RAHASIA</td>
            <td></td>
            <td colspan="3" style="text-align: center; color:black">RAHASIA</td>
        </tr>
    </table>

    <table class="table table-bordered" style="color: black; font-size:10px; padding:0; ">
        <tr>
            <td>4.</td>
            <td colspan="4">UNSUR YANG DINILAI</td>
            <td>Jumlah</td>
            <td rowspan="26"></td>
            <td>6.</td>
            <td>TANGGAPAN PEJABAT PENILAI</td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td rowspan="10"></td>
            <td colspan="2">a. Sasaran Kerja Pegawai (SKP)</td>
            <td>86,78</td>
            <td>x 60%</td>
            <td>51,00</td>
            <td></td>
            <td>ATAS KEBERATAN</td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td rowspan="8">b. Perilaku Kerja</td>
            <td>1. Orientasi Pelayanan</td>
            <td>{{ $nilai_prilaku->orientasi_pelayanan }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->orientasi_pelayanan) }} )</td>
            <td rowspan="8"></td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>2. Integritas</td>
            <td>{{ $nilai_prilaku->integritas }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->integritas) }} )</td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>3. Komitmen</td>
            <td>{{ $nilai_prilaku->komitmen }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->komitmen) }} )</td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>4. Disiplin</td>
            <td>{{ $nilai_prilaku->disiplin }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->disiplin) }} )</td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>5. Kerjasama</td>
            <td>{{ $nilai_prilaku->kerjasama }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->kerjasama) }} )</td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>6. Kepemimpinan</td>
            <td>{{ $nilai_prilaku->kepemimpinan }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->kepemimpinan) }} )</td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td>Jumlah</td>
            <td>{{ $nilai_prilaku->total_nilai }}</td>
            <td>(..)</td>
            <td></td>
            <td></td>
            <td colspan="2"> Tanggal </td>
        </tr>
        <tr>
            <td>Nilai Rata-rata</td>
            <td>{{ round($nilai_prilaku->nilai_rata, 2) }}</td>
            <td>( {{ getPredikatNilai($nilai_prilaku->nilai_rata) }} )</td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td></td>
            <td>Nilai Prilau Kerja</td>
            <td>{{ round($nilai_prilaku->nilai_rata, 2) }} </td>
            <td>.. %</td>
            <td>30,,</td>
            <td></td>
            <td></td>
            <td colspan="2"></td>
        </tr>

        <tr>
            <td colspan="5" rowspan="2">NILAI PRESTASI KERJA</td>
            <td>83,,</td>
        </tr>
        <tr>
            <td>(..)</td>
        </tr>

        <tr>
            <td colspan="6">5. KEBERATAN DARI PEGAWAI KONTRAK</td>
            <td colspan="3">7. KEPUTUSAN ATASAN PEJABAT</td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6">YANG DINILAI (APABILA ADA)</td>
            <td colspan="3">PENILAI ATAS KEBERATAN</td>
            <td>{{ $nilai_prilaku->keputusan_atasan }}</td>
        </tr>
        <tr>
            <td colspan="6" rowspan="4" style="text-align:center; Padding-top:10px"> {{ $nilai_skp->keberatan }}
                <br> Tanggal,
            </td>
            <td colspan="4" style="text-align:center; Padding-top:10px">{{ $nilai_skp->keberatan }}
                <br>Tanggal,
            </td>
        </tr>
    </table>

</div>
