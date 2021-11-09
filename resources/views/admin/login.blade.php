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
    <link rel="stylesheet" href="{{ asset('public/plugins/sweetalert/sweetalert.css') }}">
</head>

<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Si<b>Balaidesa</b></a>
            <small>Mempermudah Pelayanan Masyarakat</small>
        </div>
        <div class="card">
            <div class="body">
                {{Session::get('message')}}
                @if($message = Session::get('message'))
                    Gagal   
                @endif
                <form id="sign_in" action="{{ route('auth.proses_login') }}" method="POST">
                    @csrf
                    <div class="msg">Silakan Login dibawah ini :</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="nik" placeholder="NIK" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label for="remembermesaya">Ingat !</label>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-pink waves-effect" type="submit">MASUK</button>
                        </div>
                    </div>
                    <div class="row m-t-15 m-b--20">
                        <div class="col-xs-6">
                            <a href="{{ route('auth.daftar') }}">Daftar Akun!</a>
                        </div>
                        <div class="col-xs-6 align-right">
                            {{-- <a href="forgot-password.html">Lupa Password?</a> --}}
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
    <script src="{{ asset('public/plugins/sweetalert/sweetalert.min.js') }}"></script>
    @if(session()->has('message'))
    @php
        $message = Session::get('message');
    @endphp
    <script>
    </script>
    @endif
</body>

</html>