<div class="page_break">
    <div class="dp-3 text-center">
        <p>FORMULIR SASARAN KERJA <br> PEGAWAI KONTRAK</p>
    </div>
    <table class="table table-bordered" style="color: black; border-color:black">
        {{-- <tr>
            <td colspan="5" class="text-center" style=" font-size: 15px; font-weight:600; color:black">
                <img src="{{ asset('admin/img/pancasila.png') }}" width="100px"><br>PENILAIAN KINERJA <br> PEGAWAI
                KONTRAK
            </td>
        </tr>
        <tr>
            <td colspan="5" class="text-center"
                style=" font-size: 12px;  font-weight:600; color:black; padding-top:100px">
                Jangka Waktu Penilaian <br>
                .. s/d ..
            </td>
        </tr> --}}
        <tr>
            <th style="width: 10px">NO</th>
            <th colspan="2" style="width: 200px">I PEJABAT PENILAI</th>
            <th style="width: 10px">NO</th>
            <th colspan="6" style="width: 200px">II PEGAWAI KONTRAK YANG DINILAI </th>
        </tr>
        <tr>
            <td>1</td>
            <td style="width: 100px">Nama</td>
            <td style="width: 200px">{{ $nilai_skp->penilai->nama }}</td>
            <td>1</td>
            <td colspan="2" style="width: 100px">Nama</td>
            <td colspan="4"> {{ $nilai_skp->pgwKontrak->nama }}</td>
        </tr>
        <tr>
            <td>2</td>
            <td style="width: 100px">NIP</td>
            <td>{{ $nilai_skp->penilai->nip }}</td>
            <td>2</td>
            <td colspan="2">No Kontrak</td>
            <td colspan="4">{{ $nilai_skp->pgwKontrak->no_kontrak }}</td>
        </tr>
        <tr>
            <td>3</td>
            <td style="width: 100px">Pangkat/Gol.Ruang</td>
            <td>{{ $nilai_skp->penilai->pangkatGolongan->nama }}</td>
            <td>3</td>
            <td colspan="2">Pangkat/Gol.Ruang</td>
            {{-- <td colspan="4">{{ $nilai_skp->pgwKontrak->pangkatGolongan->nama }}</td> --}}
            <td colspan="4"> - </td>
        </tr>
        <tr>
            <td>4</td>
            <td style="width: 100px">Jabatan</td>
            <td>{{ $nilai_skp->penilai->jabatan->nama }}</td>
            <td>4</td>
            <td colspan="2">Jabatan</td>
            <td colspan="4">{{ $nilai_skp->pgwKontrak->jabatan->nama }}</td>
        </tr>
        <tr>
            <td>5</td>
            <td style="width: 100px">Unit Kerja</td>
            <td>{{ $nilai_skp->penilai->unitKerja->nama }}</td>
            <td>5</td>
            <td colspan="2">Unit Kerja</td>
            <td colspan="4">{{ $nilai_skp->pgwKontrak->unitKerja->nama }}</td>
        </tr>
        <tr>
            <th rowspan="2" style="width: 10px">NO</th>
            <th rowspan="2" colspan="2" style="width: 200px">III KEGIATAN TUGAS JABATAN</th>
            <th style="width: 10px" rowspan="2">AK</th>
            <th colspan="6" style="width: 200px; text-align:center;">TARGET</th>
        </tr>
        <tr>
            <th colspan="2">KUANT/OUTPUT</th>
            <th>KUAL/MUTU</th>
            <th colspan="2">WAKTU</th>
            <th>BIAYA</th>
        </tr>
        @php
            $no = 1;
        @endphp
        @foreach ($kegiatan_skp as $data)
            <tr>
                <td>{{ $no++ }}</td>
                <td colspan="2"> {{ $data->kegiatan }}</td>
                <td>-</td>
                <td>{{ $data->kuantitas }}</td>
                <td>{{ $data->satuan_kuantitas }}</td>
                <td>{{ $data->kualitas }}</td>
                <td>{{ $data->waktu }}</td>
                <td>{{ $data->satuan_waktu }}</td>
                <td>{{ $data->biaya }}</td>
            </tr>
        @endforeach
        <tr></tr>
    </table>

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
                No Kontrak. {{ $nilai_skp->pgwKontrak->no_kontrak }}<br>
            </td>
            <td style="width: 100px"></td>
        </tr>
    </table>
</div>
