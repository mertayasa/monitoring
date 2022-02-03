<table class="table table-hover table-striped" width="100%" id="SubKegiatanDataTable">
    <thead>
        <tr>
            <th style="width: 30px">No</th>
            <th></th>
            <th>Nama Kegiatan</th>
            <th>Nama Sub Kegiatan</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

    <script>
        let table
        let url = "{{ route('sub_kegiatan.datatable') }}"

        datatable(url)

        function datatable(url) {

            table = $('#SubKegiatanDataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: url,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'no',
                        orderable: false,
                        searchable: false,
                        className: "text-center align-middle"
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        visible: false,
                        searchable: false
                    },
                    {
                        data: 'kegiatan.nama_program',
                        name: 'kegiatan.nama_program'
                    },
                    {
                        data: 'nama_sub',
                        name: 'nama_sub'
                    },
                    {
                        data: 'tgl_mulai_kegiatan',
                        name: 'tgl_mulai_kegiatan'
                    },
                    {
                        data: 'tgl_selesai_kegiatan',
                        name: 'tgl_selesai_kegiatan'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        className: "text-center align-middle"

                    }
                ],
                order: [
                    [1, "DESC"]
                ],
                columnDefs: [
                    // { width: 300, targets: 1 },
                    {
                        targets: '_all',
                        className: 'align-middle'
                    },
                    {
                        responsivePriority: 1,
                        targets: 1
                    },
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Cari"
                },
            });
        }
    </script>

@endpush
