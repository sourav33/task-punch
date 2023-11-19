<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- style -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/jquery-confirm/jquery-confirm.min.css">
    {{--
    <link rel="stylesheet" href="../../plugins/bootstrap-icons/bootstrap-icons.css"> --}}
    {{--
    <link rel="stylesheet" href="../../plugins/toastr/toastr.min.css"> --}}


    <style>
        .max-height-300 pre {
            max-height: 300px
        }

        .theme-switch {
            display: inline-block;
            height: 24px;
            position: relative;
            width: 50px
        }

        .theme-switch input {
            display: none
        }

        .slider {
            background-color: #ccc;
            bottom: 0;
            cursor: pointer;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            transition: 400ms
        }

        .slider::before {
            background-color: #fff;
            bottom: 4px;
            content: "";
            height: 16px;
            left: 4px;
            position: absolute;
            transition: 400ms;
            width: 16px
        }

        input:checked+.slider {
            background-color: #66bb6a
        }

        input:checked+.slider::before {
            transform: translateX(26px)
        }

        .slider.round {
            border-radius: 34px
        }

        .slider.round::before {
            border-radius: 50%
        }
    </style>

    <!-- Child Page css goes here  -->
    @yield('extraStyle')
    <!-- Child Page css -->

    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
    <!--styles -->

</head>

<body class="hold-transition sidebar-mini">
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="../../assets/img/logo/logo.svg" alt="">
                    <!-- <img src="../../assets/img/logo/logo.gif" alt=""> -->
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    <div class="wrapper">

        @include('includes.navbar')
        @include('includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            @include('includes.header')

            @yield('content')

        </div>

        @include('includes.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
    </div>


</body>

<script src="../../plugins/jquery/jquery.min.js"></script>


<script>
    $('#spanYear').html(new Date().getFullYear());

    var toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
    var currentTheme = localStorage.getItem('theme');
    var mainHeader = document.querySelector('.main-header');

    if (currentTheme) {
        if (currentTheme === 'dark') {
            if (!document.body.classList.contains('dark-mode')) {
                document.body.classList.add("dark-mode");
            }
            if (mainHeader.classList.contains('navbar-light')) {
                mainHeader.classList.add('navbar-dark');
                mainHeader.classList.remove('navbar-light');
            }
            toggleSwitch.checked = true;
        }
    }

    function switchTheme(e) {
        if (e.target.checked) {
            if (!document.body.classList.contains('dark-mode')) {
                document.body.classList.add("dark-mode");
            }
            if (mainHeader.classList.contains('navbar-light')) {
                mainHeader.classList.add('navbar-dark');
                mainHeader.classList.remove('navbar-light');
            }
            localStorage.setItem('theme', 'dark');
        } else {
            if (document.body.classList.contains('dark-mode')) {
                document.body.classList.remove("dark-mode");
            }
            if (mainHeader.classList.contains('navbar-dark')) {
                mainHeader.classList.add('navbar-light');
                mainHeader.classList.remove('navbar-dark');
            }
            localStorage.setItem('theme', 'light');
        }
    }

    toggleSwitch.addEventListener('change', switchTheme, false);
</script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{-- <script src="../../plugins/toastr/toastr.min.js"></script> --}}
{{-- <script src="../../plugins/sweetalert2/sweetalert2.all.min.js"></script> --}}
<script src="../../plugins/jquery-confirm/jquery-confirm.min.js"></script>


<!-- Extra js from child page -->
@yield('extraScript')
<!-- END JAVASCRIPT -->


<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>


</html>
