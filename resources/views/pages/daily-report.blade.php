@extends('layouts.app')

@section('extraStyle')
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daily Report</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Daily Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">

        <div class="container-fluid ">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Report as on {{ now()->format('d-m-Y') }}</h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>Staff ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($data) > 0)
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row['staff_id'] }}</td>
                                        <td>{{ $row['name'] }}</td>
                                        <td>{{ $row['type'] == 1 ? 'Punch In' : 'Punch Out' }}</td>
                                        <td>{{ $row['datetime'] }}</td>
                                        <td><span
                                                class="tag tag-success">{{ $row['status'] == 1 ? 'Active' : 'Inactive' }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5">No data found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>

            <div class="form-group no-print text-center">
                <input type="button" class="btn btn-success" value="Print" onclick="window.print();">
            </div>

        </div><!-- /.container-fluid -->
    </section>
@endsection


@section('extraScript')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.staff-menu').addClass('menu-is-opening menu-open');
            $('.staff').addClass('active');
            $('.daily_report_staff').addClass('active');


        });
    </script>
@endsection
