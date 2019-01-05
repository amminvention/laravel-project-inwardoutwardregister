<!DOCTYPE html>
<html lang="en" style="height: auto; min-height: 100%;"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="">

    <title>@yield('title'){{ config('app.name') }}</title>

    <!-- Bootstrap 4.1-->
    <link rel="stylesheet" href="{{ asset('assets/plugins/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">

    <!-- Bootstrap extend-->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-extend.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/master_style.css') }}">

    <!-- SoftMaterial admin skins -->
    <link rel="stylesheet" href="{{ asset('assets/css/skins/_all-skins.css') }}">

@stack('css')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="skin-red-light sidebar-mini" style="height: auto; min-height: 100%;">
<!-- Site wrapper -->
<div class="wrapper" style="height: auto; min-height: 100%;">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{ route('dashboard') }}" class="logo">
            <!-- mini logo -->
            <b class="logo-mini">
                <span class="light-logo"><h1 style="color: white"><i class="mdi mdi-nfc-tap"></i></h1></span>
            </b>
            <!-- logo-->
            <span class="logo-lg">
	  	  <span class="light-logo"><h4 style="color: white;font-weight: 700;">INwardOUTward</h4></span>
	  </span>
        </a>
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">

            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">


                    <!-- Login-->
                    @if (Route::currentRouteName() == 'register')
                        <li class="dropdown">
                            <a href="{{ url('/login') }}" class="dropdown-toggle">
                                Login
                            </a>
                        </li>
                    @endif


                    <!-- Register-->
                    @if (Route::currentRouteName() == 'login')
                        <li class="dropdown">
                            <a href="{{ url('/register') }}" class="dropdown-toggle">
                                Register
                            </a>
                        </li>
                    @endif


                </ul>
            </div>
        </nav>
    </header>




<!-- Content Wrapper. Contains page content -->
@yield('content')
<!-- /.content-wrapper -->

    <footer class="main-footer">
        <a href="https://www.facebook.com/fakhar.jr">Developed By Shehzad Fakhar</a>
    </footer>
</div>
<!-- ./wrapper -->


<!-- jQuery 3 -->
<script src="{{ asset('assets/plugins/vendor_components/jquery-3.3.1/jquery-3.3.1.js') }}"></script>

<!-- popper -->
<script src="{{ asset('assets/plugins/vendor_components/popper/dist/popper.min.js') }}"></script>

<!-- Bootstrap 4.1-->
<script src="{{ asset('assets/plugins/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- SlimScroll -->
<script src="{{ asset('assets/plugins/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>

<!-- FastClick -->
<script src="{{ asset('assets/plugins/vendor_components/fastclick/lib/fastclick.js') }}"></script>

@stack('scripts')

<!-- SoftMaterial admin App -->
<script src="{{ asset('assets/js/template.js') }}"></script>





</body></html>