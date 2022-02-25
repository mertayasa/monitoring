<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    {{-- <link href="{{ asset('admin/css/sb-admin-2.css') }}" rel="stylesheet"> --}}


    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    <title>Cetak Daftar Inventaris</title>
</head>

<body>
    {{-- <div class="container"> --}}
    {{-- <div class="card-body pt-0 " style="color: black;"> --}}
    @include('penilaian.skp.form-cover')
    <hr class="m-5">
    @include('penilaian.skp.form-dp3skp')
    <hr class="m-5">
    @include('penilaian.skp.form-buku-prilaku')
    <hr class="m-5">
    @include('penilaian.skp.form-ppk')
    <hr class="m-5">
    @include('penilaian.skp.form-penilaian-prestasi')
    <hr class="m-5">
    @include('penilaian.skp.form-penilaian-perilaku')
    <hr class="m-5">
    @include('penilaian.skp.form-integrasi')
    <hr class="m-5">
    {{-- </div> --}}
    {{-- </div> --}}



    {{-- <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> --}}
</body>

</html>
