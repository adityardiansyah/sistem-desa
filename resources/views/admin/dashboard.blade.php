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

<body class="login-page" style="max-width: 480px;">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Si<b>Balaidesa</b></a>
            <small>Mempermudah Pelayanan Masyarakat</small>
        </div>
        <div class="card">
            <div class="body">
                @if (Session::get('type') === 'daftar_masyarakat')
                <h3>
                    Hallo Password Akun Anda : <b>12345678</b> 
                </h3>
                <p>Silakan catat dan simpan password anda, untuk login di waktu lainnya!</p>

                <hr>
                @endif
                <h5 class="text-center">Pilih Kepengurusan :</h5>
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-block bg-blue waves-effect" href="{{ route('data_kelahiran.form',['tab'=>'new','id'=>'all']) }}">DATA KELAHIRAN</a>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-block bg-red waves-effect" href="{{ route('data_kematian.form',['tab'=>'new','id'=>'all']) }}">DATA KEMATIAN</a>
                    </div>
                </div>
                <hr>
                <a class="btn btn-block bg-orange waves-effect" href="{{ route('auth.logout') }}">KELUAR</a>
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