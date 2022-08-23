<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar justify-content-center">
        <div class="pt-4 pb-3">
            <center>
                <img class="img-fluid" src="{{ asset('admin/logo.png') }}" alt="Responsive image" width="100"
                    height="100">
            </center>
        </div>

        <ul class="sidebar-nav">
            <li class="sidebar-item {{ isActive('dashboard') }}">
                <a class="sidebar-link" href="{{ route('dashboard.index') }}">
                    <i class="align-middle" data-feather="home"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            @if (Auth::user()->isAdmin() or Auth::user()->isPenilai())
                @php
                    $user = isActive(['admin', 'penilai', 'kontrak']);
                @endphp
                <li class="sidebar-item">
                    <a data-target="#users" data-toggle="collapse"
                        class="sidebar-link {{ $user == 'active' ? '' : 'collapsed' }}">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Pengguna</span>
                    </a>
                    <ul id="users"
                        class="sidebar-dropdown list-unstyled {{ $user == 'active' ? 'show' : 'collapse' }}"
                        data-parent="#sidebar">
                        @if (Auth::user()->isAdmin())
                            <li class="sidebar-item {{ isActive('admin') }}"><a class="sidebar-link"
                                    href="{{ route('user.index', 'admin') }}">Admin</a></li>
                        @endif
                        <li class="sidebar-item {{ isActive('penilai') }}"><a class="sidebar-link"
                                href="{{ route('user.index', 'penilai') }}">Pejabat Penilai</a></li>
                        <li class="sidebar-item {{ isActive('kontrak') }}"><a class="sidebar-link"
                                href="{{ route('user.index', 'kontrak') }}">Pegawai Kontrak</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->isAdmin())
                <li class="sidebar-item {{ isActive('pengumuman') }}">
                    <a class="sidebar-link" href="{{ route('pengumuman.index') }}">
                        <i class="align-middle" data-feather="bell"></i> <span class="align-middle">Pengumuman</span>
                    </a>
                </li>
            @endif

                <li class="sidebar-item {{ isActive('penilaian') }}">
                    <a class="sidebar-link" href="{{ route('penilaian.index') }}">
                        <i class="align-middle" data-feather="star"></i> <span class="align-middle">Penilaian SKP</span>
                    </a>
                </li>

            @if (Auth::user()->isPenilai())
            @endif


            @php
                $kegiatan = isActive(['kegiatan', 'sub_kegiatan', 'kalender']);
            @endphp
            @if (Auth::user()->isAdmin())
                <li class="sidebar-item">
                    <a data-target="#kegiatan" data-toggle="collapse"
                        class="sidebar-link {{ $kegiatan == 'active' ? '' : 'collapsed' }}">
                        <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Kegiatan</span>
                    </a>
                    <ul id="kegiatan"
                        class="sidebar-dropdown list-unstyled {{ $kegiatan == 'active' ? 'show' : 'collapse' }}"
                        data-parent="#sidebar">
                        <li class="sidebar-item {{ isActive('kegiatan') }}"><a class="sidebar-link"
                                href="{{ route('kegiatan.index') }}">Kegiatan</a></li>
                        <li class="sidebar-item {{ isActive('sub_kegiatan') }}"><a class="sidebar-link"
                                href="{{ route('sub_kegiatan.index') }}">Sub Kegiatan</a></li>
                        <li class="sidebar-item {{ isActive('kalender') }}"><a class="sidebar-link"
                                href="{{ route('kalender.index') }}">Kalender Kegiatan</a></li>
                    </ul>
                </li>
            @else
                <li class="sidebar-item {{ isActive('kalender') }}">
                    <a class="sidebar-link" href="{{ route('kalender.index') }}">
                        <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Kegiatan</span>
                    </a>
                </li>
            @endif

            @php
                $master = isActive(['pangkat_golongan', 'unit_kerja', 'jabatan']);
            @endphp
            @if (Auth::user()->isAdmin())
                <li class="sidebar-item">
                    <a data-target="#master" data-toggle="collapse"
                        class="sidebar-link {{ $master == 'active' ? '' : 'collapsed' }}">
                        <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">Data
                            Master</span>
                    </a>
                    <ul id="master"
                        class="sidebar-dropdown list-unstyled {{ $master == 'active' ? 'show' : 'collapse' }}"
                        data-parent="#sidebar">
                        <li class="sidebar-item {{ isActive('pangkat_golongan') }}"><a class="sidebar-link"
                                href="{{ route('pangkat_golongan.index') }}">Pangkat Golongan</a></li>
                        <li class="sidebar-item {{ isActive('unit_kerja') }}"><a class="sidebar-link"
                                href="{{ route('unit_kerja.index') }}">Unit Kerja</a></li>
                        <li class="sidebar-item {{ isActive('jabatan') }}"><a class="sidebar-link"
                                href="{{ route('jabatan.index') }}">Jabatan</a></li>
                    </ul>
                </li>
            @endif
        </ul>


    </div>
</nav>
