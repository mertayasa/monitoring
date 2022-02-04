<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar justify-content-center">
        <div class="pt-4 pb-3">
            <center>
                <img class="img-fluid" src="{{ asset('admin/img/laravel-logo.png') }}" alt="Responsive image"
                    width="100" height="100">
            </center>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>

            <li class="sidebar-item {{ isActive('dashboard') }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('pengumuman') }}">
                <a class="sidebar-link" href="{{ route('pengumuman.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Pengumuman</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('pangkat_golongan') }}">
                <a class="sidebar-link" href="{{ route('pangkat_golongan.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Pangkat
                        Golongan</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('unit_kerja') }}">
                <a class="sidebar-link" href="{{ route('unit_kerja.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Unit Kerja</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('jabatan') }}">
                <a class="sidebar-link" href="{{ route('jabatan.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Jabatan</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('kegiatan') }}">
                <a class="sidebar-link" href="{{ route('kegiatan.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Kegiatan</span>
                </a>
            </li>

            <li class="sidebar-item {{ isActive('sub_kegiatan') }}">
                <a class="sidebar-link" href="{{ route('sub_kegiatan.index') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Sub
                        Kegiatan</span>
                </a>
            </li>
        </ul>


    </div>
</nav>
