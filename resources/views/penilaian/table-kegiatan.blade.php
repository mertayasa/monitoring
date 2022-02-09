<div class="table-responsive">
    <table class="table table-striped" id="tabelKegiatan">
        <thead>
            <th>No</th>
            <th>Kegiatan</th>
            <th>Kuantitas/Output</th>
            <th>Kualitas/Mutu</th>
            <th>Waktu</th>
            <th>Biaya</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @forelse ($kegiatan_skp as $kegiatan)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $kegiatan->kegiatan }}</td>
                    <td class="text-center">{{ $kegiatan->kuantitas }} {{ $kegiatan->satuan_kuantitas }}</td>
                    <td class="text-center">{{ $kegiatan->kualitas }}</td>
                    <td class="text-center">{{ $kegiatan->waktu }} {{ $kegiatan->satuan_waktu }}</td>
                    <td class="text-center">{{ $kegiatan->biaya ?? '-' }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning" data-id="{{ $kegiatan->id }}" data-kegiatan="{!! htmlspecialchars(json_encode($kegiatan), ENT_QUOTES, 'UTF-8')  !!}" onclick="showEditKegiatanForm(this)" data-bs-toggle="modal" data-bs-target="#skpModal" data-bs-toggle="tooltip" data-bs-placement="bottom">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger" data-id="{{ $kegiatan->id }}" data-id-nilai-skp="{{ $kegiatan->id_nilai_skp }}" onclick="destroyKegiatan(this)">Hapus</button>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7">
                    <div class="text-center py-5">
                        Pegawai belum memiliki kegiatan tugas jabatan
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
