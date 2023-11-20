@extends('layouts.app')

@section('extraStyle')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
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
    <script type="text/javascript">
        $(document).ready(function() {
            $('.dashboard').addClass('active');


        });
    </script>
@endsection
