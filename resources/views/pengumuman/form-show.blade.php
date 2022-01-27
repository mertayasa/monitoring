<h2 class="mb-3">Detail Artikel</h2>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-1"> </div>
            <div class="col-sm-10">
                <div class="sn-container">
                    <h2 class="sn-judul pt-5">{{ $pengumuman->judul }}</h2> <small>(
                        {{ getpengumumanStatus($pengumuman->status) }} ) </small>
                    <p>
                        {!! $pengumuman->deskripsi !!}
                    </p>
                </div>
            </div>
            <div class="col-sm-1"> </div>
        </div>
        <a href="{{ route('pengumuman.index') }}" class="btn btn-secondary">Kembali</a>
        @if (canAccess(['sekretaris']))
            <a href="{{ route('pengumuman.edit', $pengumuman->id) }}" class="btn btn-warning">Edit</a>
        @endif
    </div>
</div>
