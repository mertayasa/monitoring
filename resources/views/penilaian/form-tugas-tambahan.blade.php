@include('penilaian.table-tugas-tambahan')

<div class="modal fade" id="tambahanModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="tambahanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahanModalLabel">Tugas Tambahan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['id' => 'formTambahan']) !!}
                <div class="row">
                    {!! Form::hidden('id_nilai_skp', $nilai_skp->id, ['id' => 'idNilaiSkpTambahan']) !!}
                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('tugasTambahan', 'Nama Tugas <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
                        {!! Form::text('nama_tugas', null, ['class' => 'form-control', 'id' => 'tugasTambahan']) !!}
                        <div class="invalid-feedback" error-name="nama_tugas">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('nilaiTambahan', 'Nilai', ['class' => 'mb-1'], false) !!}
                        {!! Form::text('nilai', null, ['class' => 'form-control number-only', 'id' => 'nilaiTambahan']) !!}
                        <div class="invalid-feedback" error-name="nilai">
                        </div>
                    </div>

                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary d-none" id="btnStoreTambahan">Simpan</button>
                <button type="button" class="btn btn-primary d-none" id="btnUpdateTambahan">Update</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const tambahanModal = document.getElementById('tambahanModal')
        const formTambahan = document.getElementById('formTambahan')
        const tabelTambahan = document.getElementById('tabelTambahan')
        const btnStoreTambahan = document.getElementById('btnStoreTambahan')
        const btnUpdateTambahan = document.getElementById('btnUpdateTambahan')

        const idNilaiSkpTambahan = document.getElementById('idNilaiSkpTambahan')
        const tugasTambahan = document.getElementById('tugasTambahan')
        const nilaiTambahan = document.getElementById('nilaiTambahan')

        $('#tambahanModal').on('hidden.bs.modal', function() {
            formTambahan.reset()
            clearErrorMessage()
        })

        function showAddTambahanForm(element) {
            clearErrorMessage()
            btnStoreTambahan.setAttribute('data-url', `${baseUrl}/penilaian/store-tugas-tambahan/${idNilaiSkpTambahan.value}`)
            btnStoreTambahan.classList.remove('d-none')
            btnUpdateTambahan.classList.add('d-none')
        }

        function showEditTambahanForm(element) {
            clearErrorMessage()
            btnStoreTambahan.classList.add('d-none')
            btnUpdateTambahan.classList.remove('d-none')
            const tambahan = JSON.parse(element.getAttribute('data-tugas-tambahan'))
            
            btnUpdateTambahan.setAttribute('data-url', `${baseUrl}/penilaian/update-tugas-tambahan/${idNilaiSkpTambahan.value}/${tambahan.id}`)

            idNilaiSkpTambahan.value = tambahan.id_nilai_skp
            tugasTambahan.value = tambahan.nama_tugas
            nilaiTambahan.value = tambahan.nilai
        }

        function refresTableTambahan(table) {
            tabelTambahan.innerHTML = ''
            tabelTambahan.insertAdjacentHTML('beforeend', table)
        }

        btnStoreTambahan.addEventListener('click', event => {
            clearErrorMessage()
            const actionUrl = event.target.getAttribute('data-url')
            const formData = new FormData(formTambahan)
            fetch(actionUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'POST',
                body: formData
            })
            .then(response => {
                const data = response.json()
                if (response.status == 400) {
                    data.then((res) => {
                        const errors = res.errors
                        showValidationMessage(errors)
                    })
                }

                return data
            })
            .then(data => {
                if (data.code == 1) {
                    refresTableTambahan(data.table)
                    $('#tambahanModal').modal('hide')
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal mengubah data tugas tambahan')
            })
        })

        btnUpdateTambahan.addEventListener('click', event => {
            clearErrorMessage()
            const actionUrl = event.target.getAttribute('data-url')
            const formData = new FormData(formTambahan)
            formData.append('_method', 'PATCH')
            // console.log(actionUrl);
            fetch(actionUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                },
                method: 'POST',
                body: formData
            })
            .then(response => {
                const data = response.json()
                if (response.status == 400) {
                    data.then((res) => {
                        const errors = res.errors
                        showValidationMessage(errors)
                    })
                }

                return data
            })
            .then(data => {
                if (data.code == 1) {
                    refresTableTambahan(data.table)
                    $('#tambahanModal').modal('hide')
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal mengubah data tugas tambahan')
            })
        })

        function destroyTambahan(element){
            const idTugasTambahan = element.getAttribute('data-id')
            const idNilaiSkpTambahan = element.getAttribute('data-id-nilai-skp')
            Swal.fire({
                title: "Warning",
                text: "Yakin menghapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#169b6b',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`${baseUrl}/penilaian/destroy-tugas-tambahan/${idNilaiSkpTambahan}/${idTugasTambahan}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        method: 'DELETE',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.code == 1) {
                            refresTableTambahan(data.table)
                        }
        
                        showToast(data.code, data.message)
                    })
                    .catch((error) => {
                        showToast(0, 'Gagal menghapus data tugas tambahan')
                    })
                }
            })
        }
    </script>
@endpush
