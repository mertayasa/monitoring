<div>
    <table class="table  table-borderless" style="font-size: 12px">
        <tr>
            <td colspan="5" class="text-center" style=" font-size: 15px; font-weight:600; color:black">
                {{-- <img src="{{ public_path('admin/img/pancasila.png') }}" style="width:100px;" width="100px"><br>PENILAIAN KINERJA <br> PEGAWAI
                KONTRAK --}}
                @if (Request::is('*show*'))
                    <img src="{{ asset('admin/img/pancasila.png') }}" style="width:100px;" width="100px">
                @else
                    <img src="{{ public_path('admin/img/pancasila.png') }}" style="width:100px;" width="100px">
                @endif
                <br>PENILAIAN KINERJA <br> PEGAWAI
                KONTRAK
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-center"
                style=" font-size: 12px;  font-weight:600; color:black; padding-top:80px">
                Jangka Waktu Penilaian <br>
                {{ indonesianDate($nilai_skp->tgl_mulai_penilaian) }} s/d
                {{ indonesianDate($nilai_skp->tgl_selesai_penilaian) }}
            </td>
        </tr>
        <tr>
            <td style="width: 250px"></td>
            <td style="width: 200px;">Nama Pegawai Kontrak</td>
            <td style="width: 10px">:</td>
            <td> {{ $nilai_skp->pgwKontrak->nama }} </td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 200px">No Kontrak</td>
            <td style="width: 10px">:</td>
            <td> {{ $nilai_skp->pgwKontrak->no_kontrak }} </td>
            <td></td>
        </tr>
        {{-- <tr>
            <td></td>
            <td style="width: 200px">Pangkat Golongan Ruang</td>
            <td style="width: 10px">:</td>
            <td> {{ $nilai_skp->pgwKontrak->pangkatGolongan->nama }} </td>
            <td></td>
        </tr> --}}
        <tr>
            <td></td>
            <td style="width: 200px">Jabatan</td>
            <td style="width: 10px">:</td>
            {{-- <td>{{ $nilai_skp->pgwKontrak->jabatan->nama }} </td> --}}
            <td>-</td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td style="width: 200px">Unit Kerja</td>
            <td style="width: 10px">:</td>
            <td>{{ $nilai_skp->pgwKontrak->unitKerja->nama }} </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="5" class="text-center"
                style=" font-size: 15px; font-weight:600; color:black; padding-top:100px"">
                DINAS PENDIDIKAN KEPEMUDAAN DAN OLAHRAGA PROVINSI BALI<br> TAHUN {{ getYear() }}
            </td>
        </tr>
    </table>
</div>
