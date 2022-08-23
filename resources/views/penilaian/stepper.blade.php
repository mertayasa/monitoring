<div class="stepper mb-3">
    <ul class="nav nav-pills">
        @if (Auth::user()->isAdmin())
            <li class="nav-item">
                <a class="nav-link {{ $is_active == 1 ? 'active' : '' }}" aria-current="page"
                    href="{{ Request::is('*create*') ? 'javascript:void(0)' : route('penilaian.edit', $nilai_skp->id) }}" style="{{ Request::is('*create*') ? 'cursor:default' : '' }}"> Informasi
                    Umum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $is_active == 2 ? 'active' : '' }}"
                    href="{{ Request::is('*create*') ? 'javascript:void(0)' : route('penilaian.edit_kegiatan', $nilai_skp->id) }}" style="{{ Request::is('*create*') ? 'cursor:default' : '' }}">
                    Kegiatan</a>
            </li>
        @endif
        @if (Auth::user()->isPenilai())
            <li class="nav-item">
                <a class="nav-link {{ $is_active == 3 ? 'active' : '' }}"
                    href="{{ Request::is('*create*') ? 'javascript:void(0)' : route('penilaian.edit_prilaku', $nilai_skp->id) }}" style="{{ Request::is('*create*') ? 'cursor:default' : '' }}">
                    Perilaku</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $is_active == 4 ? 'active' : '' }}"
                    href="{{ Request::is('*create*') ? 'javascript:void(0)' : route('penilaian.edit_nilai', $nilai_skp->id) }}" style="{{ Request::is('*create*') ? 'cursor:default' : '' }}">
                    Nilai SKP</a>
            </li>
        @endif
    </ul>
</div>
