<table class="table table-hover table-striped" width="100%" id="{{ $level }}DataTable">
    <thead>
        <tr>
            <th style="width: 30px">No</th>
            <th></th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>No Telp</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')

    <script>
        let table
        let url = "{{ route('user.datatable', $level) }}"

        datatable(url)

        function datatable(url) {

            table = $("#{{ $level }}DataTable").DataTable({
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
                        data: 'foto',
                        name: 'foto'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jabatan.nama',
                        name: 'jabatan.nama'
                    },
                    {
                        data: 'no_tlp',
                        name: 'no_tlp'
                    },
                    {
                        data: 'status',
                        name: 'status'
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
