<table class="table table-hover table-striped" width="100%" id="PenilaianDataTable">
    <thead>
        <tr>
            <th style="width: 30px">No</th>
            <th></th>
            <th>Pegawai</th>
            <th>Penilai</th>
            <th>Durasi Penilaian</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

    <script>
        let table
        let url = "{{ route('penilaian.datatable') }}"

        datatable(url)

        function datatable(url) {

            table = $('#PenilaianDataTable').DataTable({
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
                        data: 'pgw_kontrak.nama',
                        name: 'pgw_kontrak.nama'
                    },
                    {
                        data: 'penilai.nama',
                        name: 'penilai.nama'
                    },
                    {
                        data: 'durasi',
                        name: 'durasi'
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
