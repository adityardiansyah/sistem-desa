<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Balaidesa - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('public/plugins/icon/icon.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/node-waves/waves.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/animate-css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/themes/all-themes.css') }}">
    <link rel="stylesheet" href="{{ asset('public/plugins/sweetalert/sweetalert.css') }}">

    @stack('css')
</head>
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">SI BALAIDESA</a>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset('public/images/user.png') }}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ Session::get('useractive')->nama }}</div>
                    <div class="email">{{ Session::get('useractive')->nik }}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="{{ route('auth.logout') }}"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN MENU</li>
                    @if (Session::get('hak_akses') !== 3)
                    <li @if(Session::get('menu_active') === 'data_penduduk') class="active" @endif>
                        <a href="{{ route('data_penduduk.index') }}">
                            <i class="material-icons">home</i>
                            <span>Data Penduduk</span>
                        </a>
                    </li>
                    @endif
                    <li @if(Session::get('menu_active') === 'data_kelahiran') class="active" @endif>
                        <a href="{{ route('data_kelahiran.index') }}">
                            <i class="material-icons">text_fields</i>
                            <span>Data Kelahiran</span>
                        </a>
                    </li>
                    <li @if(Session::get('menu_active') === 'data_kematian') class="active" @endif>
                        <a href="{{ route('data_kematian.index') }}">
                            <i class="material-icons">layers</i>
                            <span>Data Kematian</span>
                        </a>
                    </li>
                    {{-- <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">widgets</i>
                            <span>Widgets</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Cards</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Basic</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Colored</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html">No Header</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Infobox</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2021 <a href="javascript:void(0);">Si Balaidesa</a>.
                </div>
                <div class="version">
                    <b>By: </b> Fitha Ayuningtyas
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>


    <script src="{{ asset('public/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('public/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/plugins/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/plugins/node-waves/waves.js') }}"></script>
    <script src="{{ asset('public/js/admin.js') }}"></script>
    <script src="{{ asset('public/plugins/sweetalert/sweetalert.min.js') }}"></script>
    @stack('js')
    
    @if(session()->has('message'))
    @php
        $message = Session::get('message');
    @endphp
    <script>
        swal({
            animation: "slide-from-top",
            type: "{{ $message['type'] }}",
            title: "{{ $message['content'] }}",
            showConfirmButton: false,
            timer: 3000,
            toast: true,
            showConfirmButton: false
        })
    </script>
    @endif
</body>
</html>