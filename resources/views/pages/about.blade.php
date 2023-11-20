@extends('layouts.app')

@section('extraStyle')
    {{-- <link rel="stylesheet" href="../../plugins/ionicons/2.0.1/css/ionicons.min.css"> --}}
    {{-- <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <link rel="stylesheet" href="../../plugins/bs-stepper/css/bs-stepper.min.css">
    <link rel="stylesheet" href="../../plugins/dropzone/min/dropzone.min.css"> --}}
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">

        <div class="container-fluid">


        </div><!-- /.container-fluid -->
    </section>
@endsection


@section('extraScript')
    {{-- <script src="../../plugins/select2/js/select2.full.min.js"></script> --}}

    {{-- <script src="../../plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script> --}}

    {{-- <script src="../../plugins/moment/moment.min.js"></script> --}}
    {{-- <script src="../../plugins/inputmask/jquery.inputmask.min.js"></script> --}}

    {{-- <script src="../../plugins/daterangepicker/daterangepicker.js"></script> --}}

    {{-- <script src="../../plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script> --}}

    {{-- <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> --}}

    {{-- <script src="../../plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script> --}}

    {{-- <script src="../../plugins/bs-stepper/js/bs-stepper.min.js"></script> --}}

    {{-- <script src="../../plugins/dropzone/min/dropzone.min.js"></script> --}}

    {{-- <script src="plugins/chart.js/Chart.min.js"></script> --}}

    {{-- <script src="dist/js/pages/dashboard3.js"></script> --}}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.dashboard').addClass('active');


        });
    </script>
@endsection
