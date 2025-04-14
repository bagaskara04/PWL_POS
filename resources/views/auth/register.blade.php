<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register Pengguna</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

    <style>
        select.form-control option {
            color: #000 !important;
            background-color: #fff !important;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"><b>Admin</b>LTE</a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Daftar akun baru</p>

                <form action="{{ url('register') }}" method="post" id="form-register">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-user"></span></div>
                        </div>
                        <small id="error-username" class="error-text text-danger"></small>
                    </div>

                    <div class="input-group mb-3">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-id-card"></span></div>
                        </div>
                        <small id="error-nama" class="error-text text-danger"></small>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text"><span class="fas fa-lock"></span></div>
                        </div>
                        <small id="error-password" class="error-text text-danger"></small>
                    </div>

                    <div class="mb-3">
                        <select name="level_id" class="form-control" required>
                            <option value="">-- Pilih Level --</option>
                            @foreach ($level as $l)
                                <option value="{{ $l->level_id }}">{{ $l->level_nama }}</option>
                            @endforeach
                        </select>
                        <small id="error-level_id" class="error-text text-danger"></small>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <a href="{{ url('login') }}">Sudah punya akun?</a>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('#form-register').validate({
                rules: {
                    username: {
                        required: true,
                        minlength: 4
                    },
                    nama: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 4
                    },
                    level_id: {
                        required: true
                    }
                },
                submitHandler: function(form) {
                    $.ajax({
                        url: form.action,
                        method: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if (response.status) {
                                Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.message
                                    })
                                    .then(() => window.location = response.redirect);
                            } else {
                                $('.error-text').text('');
                                $.each(response.msgField, (prefix, val) => {
                                    $('#error-' + prefix).text(val[0]);
                                });
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: response.message
                                });
                            }
                        }
                    });
                    return false;
                },
                errorElement: 'span',
                errorPlacement: (error, element) => {
                    error.addClass('invalid-feedback');
                    element.closest('.input-group, .mb-3').append(error);
                },
                highlight: element => $(element).addClass('is-invalid'),
                unhighlight: element => $(element).removeClass('is-invalid')
            });
        });
    </script>
</body>

</html>
