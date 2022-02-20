<div class="table-responsive">
    <table class="table table-striped" id="tabelTambahan">
        <thead>
            <th class="text-center">No</th>
            <th>Kegiatan</th>
            <th class="text-center">Nilai</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @forelse ($tugas_tambahan as $tambahan)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $tambahan->nama_tugas }}</td>
                    <td class="text-center">{{ $tambahan->nilai ?? '-' }}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-warning" data-id="{{ $tambahan->id }}" data-tugas-tambahan="{!! htmlspecialchars(json_encode($tambahan), ENT_QUOTES, 'UTF-8')  !!}" onclick="showEditTambahanForm(this)" data-bs-toggle="modal" data-bs-target="#tambahanModal" data-bs-toggle="tooltip" data-bs-placement="bottom">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger" data-id="{{ $tambahan->id }}" data-id-nilai-skp="{{ $tambahan->id_nilai_skp }}" onclick="destroyTambahan(this)">Hapus</button>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="7">
                    <div class="text-center py-5">
                        Pegawai tidak memiliki kegiatan tugas tambahan
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
