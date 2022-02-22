<?php

use App\Models\TahunAjar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

function formatPrice($value)
{
    return 'Rp ' . number_format($value, 0, ',', '.');
}

function isActive($param)
{
    $segment = Request::segments();

    if (is_array($param)) {
        foreach ($param as $par) {
            if (Request::route()->getPrefix() == '/' . $par || in_array($par, $segment)) {
                return 'active';
            }
        }
    } else {
        return (Request::route()->getPrefix() == '/' . $param || in_array($param, $segment)) ? 'active' : '';
    }

    return '';
}

function isNull($value)
{
    return $value == null || $value == '' ? true : false;
}

function showFor($roles)
{
    foreach ($roles as $role) {
        if (roleName() == $role) {
            return true;
        }
    }

    return false;
}

function roleName($level = null)
{
    $role_name = ($level ?? Auth::user()->level) == User::$admin ? 'admin' : (($level ?? Auth::user()->level) == User::$penilai ? 'penilai' : User::$kontrak);

    return $role_name;
}

function indonesianDate($date)
{
    return Carbon::parse($date)->isoFormat('LL');
}

function getAge($date)
{
    $birth_date = Carbon::parse($date);
    $now = Carbon::now();

    return $birth_date->diffInYears($now);
}

function uploadFile($base_64_foto, $folder)
{
    try {
        $foto = base64_decode($base_64_foto['data']);
        $folderName = 'images/' . $folder;

        if (!file_exists($folderName)) {
            mkdir($folderName, 0755, true);
        }

        $safeName = time() . $base_64_foto['name'];
        $inventoriePath = public_path() . '/' . $folderName;
        file_put_contents($inventoriePath . '/' . $safeName, $foto);
    } catch (Exception $e) {
        Log::info($e->getMessage());
        return 0;
    }

    return $folder . '/' . $safeName;
}

function countWeekPerMonth($month_index, $year)
{
    $start_of_month = \Carbon\Carbon::create()->day(1)->year($year)->month($month_index);
    $end_of_month = \Carbon\Carbon::create()->day(1)->year($year)->month($month_index)->addMonth()->subDay();
    $sunday_count = 0;
    $period =  \Carbon\CarbonPeriod::create($start_of_month, $end_of_month);
    $period_array = $period->toArray();
    foreach ($period_array as $key => $date) {
        if ($date->format('l') == 'Sunday') {
            $sunday_count++;
        }
    }

    return $sunday_count;
}

function getDayCode($day)
{
    switch(strtolower($day)){
        case 'senin':
            return 1;
        break;
        case 'selasa':
            return 2;
        break;
        case 'rabu':
            return 3;
        break;
        case 'kamis':
            return 4;
        break;
        case 'jumat':
            return 5;
        break;
        case 'sabtu':
            return 6;
        break;
        case 'minggu':
            return 7;
        break;
    }
}

function getHari()
{
    return [
        '1' => 'Senin',
        '2' => 'Selasa',
        '3' => 'Rabu',
        '4' => 'Kamis',
        '5' => 'Jumat',
        '6' => 'Sabtu',
        '7' => 'Minggu',
    ];
}

function getPredikatNilai($nilai)
{
    switch($nilai){
        case $nilai > 0 and $nilai <= 50:
            return 'Sangat Kurang';
        break;
        case $nilai > 50 and $nilai <= 70:
            return 'Kurang';
        break;
        case $nilai > 70 and $nilai <= 90:
            return 'Cukup';
        break;
        case $nilai > 90 and $nilai <= 120:
            return 'Baik';
        break;
        case $nilai > 110:
            return 'Sangat Baik';
        break;
    }
}


function getYear()
{
    return Carbon::parse('now')->isoFormat('Y');
}

