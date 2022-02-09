<div class="stepper mb-3">
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link {{ $is_active == 1 ? 'active' : '' }}" aria-current="page"
                href="{{ Request::is('*create*') ? 'javascript:void(0)' : route('penilaian.edit', $nilai_skp->id) }}" style="{{ Request::is('*create*') ? 'cursor:default' : '' }}">1. Informasi
                Umum</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $is_active == 2 ? 'active' : '' }}"
                href="{{ Request::is('*create*') ? 'javascript:void(0)' : route('penilaian.edit_kegiatan', $nilai_skp->id) }}" style="{{ Request::is('*create*') ? 'cursor:default' : '' }}">2.
                Kegiatan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $is_active == 3 ? 'active' : '' }}"
                href="{{ Request::is('*create*') ? 'javascript:void(0)' : route('penilaian.edit_prilaku', $nilai_skp->id) }}" style="{{ Request::is('*create*') ? 'cursor:default' : '' }}">3.
                Perilaku</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $is_active == 4 ? 'active' : '' }}"
                href="{{ Request::is('*create*') ? 'javascript:void(0)' : route('penilaian.edit_nilai', $nilai_skp->id) }}" style="{{ Request::is('*create*') ? 'cursor:default' : '' }}">4.
                Nilai SKP</a>
        </li>
    </ul>
</div>
