@extends('layouts.app')

@section('extraStyle')
    <link rel="stylesheet" href="../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" type="text/css" href="../plugins/datatables/1.13.6/css/jquery.dataTables.min.css">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Staff List</h1>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Staff List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">

        <div class="container-fluid">

            <div class="card">
                <div class="card-header">
                    <span class="card-title font-weight-bold">
                        Staff List
                    </span>
                    <a class="btn-primary btn float-right" href="#">Add New</a>
                </div>

                <div class="card-body">
                    <table id="data-table" class="display">
                        <!-- table body here -->
                    </table>
                </div>
            </div>



        </div>
    </section>
@endsection


@section('extraScript')
    <script type="text/javascript" charset="utf8" src="../plugins/datatables/1.13.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="../plugins/moment/moment.min.js"></script>

    <script src="../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

    <script type="text/javascript">
        function searchData() {

            var startDate = moment($('#start_date').val(), 'MM/DD/YYYY hh:mm A').format('YYYY-MM-DD HH:mm:ss');
            var endDate = moment($('#end_date').val(), 'MM/DD/YYYY hh:mm A').format('YYYY-MM-DD HH:mm:ss');


            // Get the DataTable instance
            var dataTable = $('#data-table').DataTable();

            // Update the DataTable's ajax URL with the new parameters
            dataTable.ajax.url('{{ route('staff.data_table') }}?start_date=' + startDate + '&end_date=' + endDate).load();

            $('#btnSearch').prop('disabled', false);

        }


        $('input[type="text"]').on('change', function() {
            $('#btnSearch').prop('disabled', false);
        });


        $(document).ready(function() {
            $('.staff-menu').addClass('menu-is-opening menu-open');
            $('.staff').addClass('active');
            $('.list_staff').addClass('active');

            //Date and time picker
            $('#start_date_reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });

            //Date and time picker
            $('#end_date_reservationdatetime').datetimepicker({
                icons: {
                    time: 'far fa-clock'
                }
            });




            var dataTable = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '{{ route('staff.data_table') }}',
                },
                columns: [{
                        data: 'staff_id',
                        name: 'staff_id',
                        title: 'Staff ID',
                        width: 100,
                        render: function(data, type, row, meta) {
                            var invoiceLink = '<a href="/' + data +
                                '">' + data + '</a>';
                            return invoiceLink;
                        }
                    },
                    {
                        data: 'name',
                        name: 'name',
                        title: 'Name',
                        width: 200,
                    },
                    {
                        data: 'status',
                        name: 'status',
                        title: 'Status',
                        width: 100,
                        render: function(data, type, row, meta) {
                            if (data === 1) {
                                return '<span>Active</span>';
                            } else {
                                return '<span>Inactive</span>';
                            }
                        }
                    }
                ]
            });



        });
    </script>
@endsection
