<h2 class="mb-3">Detail Pengumuman</h2>
<div class="card">
    <div class="card-body">
        <div class="row">

            <div class="col-sm-10">
                <div class="sn-container">
                    <h2 class="sn-judul pt-5">{{ $pengumuman->judul }}</h2>
                    <small>(
                        {{ $pengumuman->status }} ) </small>
                    <br><br>
                    <p>
                        {!! $pengumuman->deskripsi !!}
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>
