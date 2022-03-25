<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
    <meta name="author" content="AdminKit">
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    {{-- <link rel="shortcut icon" href="img/icons/icon-48x48.png" /> --}}

    <title>Sistem Informasi Monitoring</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href=" {{ asset('datatables/datatables.css') }}">
    <style>
        .select2 {
            width: 100% !important;
        }

        .toast-error {
            background-color: red !important;
        }

        .toast-success {
            background-color: green !important;
        }

        .col-md-16-6 {
            flex: 0 0 auto;
            width: 16.6%;
        }

        /* .use-select2-height {
            height: calc(1.5em + 0.75rem + 2px) !important;
        } */

        .select2-container--bootstrap4 .select2-selection--single{
            height: calc(1.3em + 0.75rem + 2px) !important;
        }

        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding-top: 35vh;
            z-index: 9999;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.9);
        }

        .loader {
            position: absolute;
            left: 50%;
            margin-top: 1rem;
            transform: translate(-50%, -50%);
            height: 5px;
            width: 15rem;
            background-color: lightgrey;
        }

        .fade-out {
            -webkit-animation: fadeout 1s linear forwards;
            animation: fadeout 1s linear forwards;
            opacity: 1;
        }

        @keyframes fadeout {
            100% {
                opacity: 0;
                z-index: -1;
            }
        }

        .loading {
            background-color: #0e76a8;
            width: 5rem;
            height: 5px;
            animation: animation 1.8s infinite;
        }

        @keyframes animation {
            0% {
                transform: translateX(0rem);
            }

            50% {
                transform: translateX(10rem);
            }

            100% {
                transform: translateX(0rem);
            }
        }

        .required {
            color: red !important;
        }

    </style>
    @stack('styles')
</head>

<body>
    <div id="preloader">
        <div class="text-center">
            <img src="{{ asset('admin/logo.png') }}" width="50px">
            <b>Sistem Monitoring</b>
        </div>


        <div class="loader">
            <div class="loading">
            </div>
        </div>
    </div>
    <div class="wrapper">
        @include('layouts.sidebar')
        <div class="main">
            @include('layouts.navbar')

            <main class="content">
                @yield('content')
            </main>

            {{-- <footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-left">
							<p class="mb-0">
								<a href="index.html" class="text-muted"><strong>AdminKit Demo</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-right">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="#">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="#">Terms</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer> --}}
        </div>
    </div>

    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('admin/js/app.js') }}"></script>
    <script src="{{ asset('datatables/datatables.js') }}"></script>
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css"> --}}
    <script>
        const baseUrl = "{{ url('/') }}"

        function deleteModel(deleteUrl, tableId, additionalMethod = null) {
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
                    $.ajax({
                        url: deleteUrl,
                        dataType: "Json",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        method: "delete",
                        success: function(data) {
                            if (data.code == 1) {
                                Swal.fire(
                                    'Berhasil',
                                    data.message,
                                    'success'
                                )

                                if (additionalMethod != null) {
                                    additionalMethod.apply(this, [data.args])
                                }

                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.message
                                })
                            }

                            $('#' + tableId).DataTable().ajax.reload();
                        }
                    })
                }
            })
        }

        function showPassword(id) {
            var passWordEl = document.getElementById(id);
            if (passWordEl.type === "password") {
                passWordEl.type = "text";
            } else {
                passWordEl.type = "password";
            }
        }

        const numberOnlyInput = document.getElementsByClassName('number-only')
        for (let index = 0; index < numberOnlyInput.length; index++) {
            const numberOnly = numberOnlyInput[index];
            numberOnly.addEventListener('input', function(element) {
                element.target.value = element.target.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')
            })
        }

        $(document).ready(function() {
            $('select:not(.custom-select)').select2({
                theme: 'bootstrap4',
            });
        })

        function showToast(code, text) {
            if (code == 1) {
                toastr.success(text)
            }

            if (code == 0) {
                toastr.error(text)
            }
        }

        function clearErrorMessage() {
            const invalidFeedback = document.getElementsByClassName('invalid-feedback')

            for (let invalid = 0; invalid < invalidFeedback.length; invalid++) {
                const element = invalidFeedback[invalid]
                const targetField = element.getAttribute('error-name')
                const inputElement = document.querySelectorAll(`[name="${targetField}"]`)
                element.innerHTML = ''
                for (let inputEl = 0; inputEl < inputElement.length; inputEl++) {
                    if (inputElement[inputEl] != undefined) {
                        inputElement[inputEl].classList.remove('is-invalid')
                    }
                }
            }
        }

        function showValidationMessage(errors) {
            Object.keys(errors).forEach(function(key) {
                let errorSpan = document.querySelectorAll(`[error-name="${key}"]`)
                let errorInput = document.querySelectorAll(`[name="${key}"]`)

                for (let eInput = 0; eInput < errorInput.length; eInput++) {
                    const selectedErrorInput = errorInput[eInput];
                    selectedErrorInput.classList.add('is-invalid')
                }

                for (let eSpan = 0; eSpan < errorSpan.length; eSpan++) {
                    const selectedErrorSpan = errorSpan[eSpan];
                    if (selectedErrorSpan != undefined) {
                        selectedErrorSpan.innerHTML = errors[key][0]
                    } else {
                        showToast(0, 'Terjadi kesalahan pada sistem')
                    }
                }

            })
        }

        function isNull(value) {
            if (value == '' || value == undefined || value == null) {
                return true
            }

            return false;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $.fn.dataTable.tables({
                    visible: true,
                    api: true
                }).columns.adjust().responsive.recalc().ajax.reload();
            });
        })
    </script>

    <script>
        function removeAnimation() {
            const preloader = document.getElementById('preloader')
            preloader.classList.add('fade-out')
        }

        document.addEventListener("DOMContentLoaded", removeAnimation)
    </script>

    @stack('scripts')
</body>

</html>
