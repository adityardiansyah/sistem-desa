<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <title>Si Balaidesa - Login</title>
    <link rel="stylesheet" href="{{ asset('public/plugins/icon/icon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/node-waves/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/animate-css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Si<b>Balaidesa</b></a>
            <small>Mempermudah Pelayanan Masyarakat</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="sign_in" action="{{ route('auth.proses_daftar') }}" method="POST">
                    @csrf
                    <div class="msg">Masukkan NIK Anda dibawah ini :</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nik" placeholder="NIK" required autofocus>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <a class="btn btn-block bg-secondary waves-effect" href="{{ route('auth.login') }}">KEMBALI</a>
                        </div>
                        <div class="col-xs-6">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">DAFTAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('public/js/admin.js') }}"></script>
    <script src="{{ asset('public/js/pages/examples/sign-in.js') }}"></script>
</body>

</html>