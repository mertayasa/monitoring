@include('penilaian.table-kegiatan')

<div class="modal fade" id="skpModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
    aria-labelledby="skpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="skpModalLabel">Kegiatan Jabatan Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {!! Form::open(['id' => 'formSkp']) !!}
                <div class="row">
                    {!! Form::hidden('id_nilai_skp', $nilai_skp->id, ['id' => 'idNilaiSkp']) !!}
                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('kegiatanSKP', 'Kegiatan SKP <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
                        {{-- {!! Form::text('kegiatan', null, ['class' => 'form-control', 'id' => 'kegiatanSKP']) !!} --}}
                        {!! Form::select('kegiatan', [
                            'Melaksanakan monitoring di smk 1 denpasar' => 'Melaksanakan monitoring di smk 1 denpasar',
                            'Melaksankan kegiatan pemberian sarana dan prasarana di smk 1 denpasar' => 'Melaksankan kegiatan pemberian sarana dan prasarana di smk 1 denpasar' 
                        ], null, ['class' => 'form-control', 'id' => 'kegiatanSKP']) !!}
                        <div class="invalid-feedback" error-name="kegiatan">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('kuantitasSKP', 'Kuantitas <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
                        {!! Form::text('kuantitas', null, ['class' => 'form-control number-only', 'id' => 'kuantitasSKP']) !!}
                        <div class="invalid-feedback" error-name="kuantitas">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('satuanKuantitasSKP', 'Satuan Kuantitas <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
                        {!! Form::text('satuan_kuantitas', null, ['class' => 'form-control', 'id' => 'satuanKuantitasSKP', 'placeholder' => 'laporan, pelaporan, lembar, dll']) !!}
                        <div class="invalid-feedback" error-name="satuan_kuantitas">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('waktuSKP', 'Waktu <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
                        {!! Form::text('waktu', null, ['class' => 'form-control number-only', 'id' => 'waktuSKP']) !!}
                        <div class="invalid-feedback" error-name="waktu">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('satuanWaktuSKP', 'Satuan Waktu <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
                        {!! Form::text('satuan_waktu', null, ['class' => 'form-control', 'id' => 'satuanWaktuSKP', 'placeholder' => 'minggu, bulan, dll']) !!}
                        <div class="invalid-feedback" error-name="satuan_waktu">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('kualitasSKP', 'Kualitas <span class="required">*</span>', ['class' => 'mb-1'], false) !!}
                        {!! Form::text('kualitas', null, ['class' => 'form-control number-only', 'id' => 'kualitasSKP']) !!}
                        <div class="invalid-feedback" error-name="kualitas">
                        </div>
                    </div>

                    <div class="col-12 pb-3 pb-md-0 mb-2">
                        {!! Form::label('biayaSKP', 'Biaya', ['class' => 'mb-1'], false) !!}
                        {!! Form::text('biaya', null, ['class' => 'form-control number-only', 'id' => 'biayaSKP']) !!}
                        <div class="invalid-feedback" error-name="biaya">
                        </div>
                    </div>

                </div>
                {{ Form::close() }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary d-none" id="btnStoreKegiatan">Simpan</button>
                <button type="button" class="btn btn-primary d-none" id="btnUpdateKegiatan">Update</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        const skpModal = document.getElementById('skpModal')
        const formSkp = document.getElementById('formSkp')
        const tabelKegiatan = document.getElementById('tabelKegiatan')
        const btnStoreKegiatan = document.getElementById('btnStoreKegiatan')
        const btnUpdateKegiatan = document.getElementById('btnUpdateKegiatan')

        const idNilaiSkp = document.getElementById('idNilaiSkp')
        const kegiatanSKP = document.getElementById('kegiatanSKP')
        const kuantitasSKP = document.getElementById('kuantitasSKP')
        const satuanKuantitasSKP = document.getElementById('satuanKuantitasSKP')
        const waktuSKP = document.getElementById('waktuSKP')
        const satuanWaktuSKP = document.getElementById('satuanWaktuSKP')
        const kualitasSKP = document.getElementById('kualitasSKP')
        const biayaSKP = document.getElementById('biayaSKP')

        $('#skpModal').on('hidden.bs.modal', function() {
            formSkp.reset()
            clearErrorMessage()
        })

        function showAddKegiatanForm(element) {
            clearErrorMessage()
            btnStoreKegiatan.setAttribute('data-url', `${baseUrl}/penilaian/store-kegiatan/${idNilaiSkp.value}`)
            btnStoreKegiatan.classList.remove('d-none')
            btnUpdateKegiatan.classList.add('d-none')
            kegiatanSKP.value = 'Melaksanakan monitoring di smk 1 denpasar'
            
            $('#kegiatanSKP').select2({
                theme: 'bootstrap4'
            }).trigger('change')
        }

        function showEditKegiatanForm(element) {
            clearErrorMessage()
            btnStoreKegiatan.classList.add('d-none')
            btnUpdateKegiatan.classList.remove('d-none')
            const kegiatan = JSON.parse(element.getAttribute('data-kegiatan'))
            
            btnUpdateKegiatan.setAttribute('data-url', `${baseUrl}/penilaian/update-kegiatan/${idNilaiSkp.value}/${kegiatan.id}`)

            idNilaiSkp.value = kegiatan.id_nilai_skp
            kegiatanSKP.value = kegiatan.kegiatan
            
            $('#kegiatanSKP').select2({
                theme: 'bootstrap4'
            }).trigger('change')

            kuantitasSKP.value = kegiatan.kuantitas
            satuanKuantitasSKP.value = kegiatan.satuan_kuantitas
            waktuSKP.value = kegiatan.waktu
            satuanWaktuSKP.value = kegiatan.satuan_waktu
            kualitasSKP.value = kegiatan.kualitas
            biayaSKP.value = kegiatan.biaya
        }

        function refresMapelTableKegiatan(table) {
            tabelKegiatan.innerHTML = ''
            tabelKegiatan.insertAdjacentHTML('beforeend', table)
        }

        btnStoreKegiatan.addEventListener('click', event => {
            clearErrorMessage()
            const actionUrl = event.target.getAttribute('data-url')
            const formData = new FormData(formSkp)
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
                    refresMapelTableKegiatan(data.table)
                    $('#skpModal').modal('hide')
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal mengubah data kegiatan')
            })
        })

        btnUpdateKegiatan.addEventListener('click', event => {
            clearErrorMessage()
            const actionUrl = event.target.getAttribute('data-url')
            const formData = new FormData(formSkp)
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
                    refresMapelTableKegiatan(data.table)
                    $('#skpModal').modal('hide')
                }

                showToast(data.code, data.message)
            })
            .catch((error) => {
                showToast(0, 'Gagal mengubah data kegiatan')
            })
        })

        function destroyKegiatan(element){
            const idKegiatan = element.getAttribute('data-id')
            const idNilaiSkp = element.getAttribute('data-id-nilai-skp')
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
                    fetch(`${baseUrl}/penilaian/destroy-kegiatan/${idNilaiSkp}/${idKegiatan}`, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        },
                        method: 'DELETE',
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.code == 1) {
                            refresMapelTableKegiatan(data.table)
                        }
        
                        showToast(data.code, data.message)
                    })
                    .catch((error) => {
                        showToast(0, 'Gagal menghapus data kegiatan')
                    })
                }
            })
        }
    </script>
@endpush
