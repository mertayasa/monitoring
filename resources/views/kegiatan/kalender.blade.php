@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0">
        <h1 class=" mb-3">Kalender Kegiatan Tahun Anggaran {{ $year }}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center align-middle">No</th>
                                        <th rowspan="2" class="text-center align-middle">Kegiatan</th>
                                        <th colspan="{{ countWeekPerMonth(1, $year) }}" class="text-center">Januari</th>
                                        <th colspan="{{ countWeekPerMonth(2, $year) }}" class="text-center">Februari</th>
                                        <th colspan="{{ countWeekPerMonth(3, $year) }}" class="text-center">Maret</th>
                                        <th colspan="{{ countWeekPerMonth(4, $year) }}" class="text-center">April</th>
                                        <th colspan="{{ countWeekPerMonth(5, $year) }}" class="text-center">Mei</th>
                                        <th colspan="{{ countWeekPerMonth(6, $year) }}" class="text-center">Juni</th>
                                        <th colspan="{{ countWeekPerMonth(7, $year) }}" class="text-center">Juli</th>
                                        <th colspan="{{ countWeekPerMonth(8, $year) }}" class="text-center">Agustus</th>
                                        <th colspan="{{ countWeekPerMonth(9, $year) }}" class="text-center">September</th>
                                        <th colspan="{{ countWeekPerMonth(10, $year) }}" class="text-center">Oktober</th>
                                        <th colspan="{{ countWeekPerMonth(11, $year) }}" class="text-center">November</th>
                                        <th colspan="{{ countWeekPerMonth(12, $year) }}" class="text-center">Desember</th>
                                    </tr>
                                    <tr>
                                        @for ($i = 0; $i < 12; $i++)
                                            @php
                                                $sunday_count = countWeekPerMonth($i, $year);
                                            @endphp
                                            <td>1</td>
                                            <td>2</td>
                                            <td>3</td>
                                            <td>4</td>
                                            @if ($sunday_count == 5)
                                                <td>5</td>
                                            @endif
                                        @endfor
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kegiatan as $kegia)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kegia->nama_program }}</td>
                                            <td colspan="60"></td>
                                        </tr>
                                        @forelse ($kegia->subKegiatan as $sub_kegiatan)
                                            <tr>
                                                <td></td>
                                                <td>{{ $sub_kegiatan->nama_sub }}</td>
                                                @php
                                                    $week_index = 1;
                                                @endphp
                                                @for ($i = 1; $i <= 12; $i++)
                                                    @php
                                                        $sunday_count = countWeekPerMonth($i, $year);
                                                    @endphp
                                                    <td class="{{ $sub_kegiatan->checkMingguKegiatan($week_index++, $year) }}"></td>
                                                    <td class="{{ $sub_kegiatan->checkMingguKegiatan($week_index++, $year) }}"></td>
                                                    <td class="{{ $sub_kegiatan->checkMingguKegiatan($week_index++, $year) }}"></td>
                                                    <td class="{{ $sub_kegiatan->checkMingguKegiatan($week_index++, $year) }}"></td>
                                                    @if ($sunday_count == 5)
                                                        <td class="{{ $sub_kegiatan->checkMingguKegiatan($week_index++, $year) }}"></td>
                                                    @endif
                                                @endfor
                                            </tr>
                                        @empty
                                            
                                        @endforelse
                                    @empty
                                        <td colspan="62"> Tidak kegiatan di tahun {{ $year }} </td>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection