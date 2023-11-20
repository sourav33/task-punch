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
                    <button class="btn-primary btn float-right" id="add_new_btn">Add New</button>
                </div>

                <div class="card-body">
                    <table id="data-table" class="display">
                        <!-- table body here -->
                    </table>
                </div>
            </div>



        </div>




        <!-- Start Modal Add Staff -->
        <form id="staff-add-form">
            <div class="modal fade" id="addStaffDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i>
                                Enter Staff Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            @csrf

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Staff ID</label><span
                                            class="text-danger font-weight-bold">*</span>
                                        <input type="number" class="form-control" name="add_txt_staff_id"
                                            id="add_txt_staff_id" placeholder="Enter Staff ID" maxlength="100" required>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Staff Name</label><span
                                            class="text-danger font-weight-bold">*</span>
                                        <input type="text" class="form-control" name="add_txt_staff_name"
                                            id="add_txt_staff_name" placeholder="Enter Staff Name" maxlength="100" required>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Staff Password</label><span
                                            class="text-danger font-weight-bold">*</span>
                                        <input type="text" class="form-control" name="add_txt_staff_password"
                                            id="add_txt_staff_password" placeholder="Enter Staff Password" maxlength="100"
                                            required autocomplete="off">
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Status</label> <span
                                            class="text-danger font-weight-bold">*</span>
                                        <select name="add_txt_staff_status" id="add_txt_staff_status" class="form-control"
                                            required>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-primary" id="add-submit-btn">Submit</button>
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </form>
        <!-- End Modal Add Staff -->




        <!-- Modal Details Edit staff -->
        <form id="staff-edit-form">
            <div class="modal fade" id="editStaffDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa-regular fa-square-plus"></i>
                                Enter Staff Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div class="modal-body">
                            @csrf

                            <input type="hidden" class="form-control" name="edit_txt_id" id="edit_txt_id"
                                placeholder="edit_txt_id" readonly>



                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Staff ID</label><span
                                            class="text-danger font-weight-bold">*</span>
                                        <input type="number" class="form-control" name="edit_txt_staff_id"
                                            id="edit_txt_staff_id" placeholder="Enter Staff ID" maxlength="100" required
                                            readonly>
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">New Staff ID</label>
                                        <input type="number" class="form-control" name="edit_txt_new_staff_id"
                                            id="edit_txt_new_staff_id" placeholder="Enter New Staff ID" maxlength="100">
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Staff Name</label>
                                        <input type="text" class="form-control" name="edit_txt_staff_name"
                                            id="edit_txt_staff_name" placeholder="Enter Staff Name" maxlength="100">
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Staff Password</label>
                                        <input type="text" class="form-control" name="edit_txt_staff_password"
                                            id="edit_txt_staff_password" placeholder="Enter Staff Password"
                                            maxlength="100" autocomplete="off">
                                    </div>
                                </div>

                            </div>


                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="edit_txt_staff_status" id="add_txt_staff_status"
                                            class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-sm btn-success" id="edit-submit-btn">Update</button>
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


        </form>
        <!-- End Modal Add staff -->




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
                    },
                    {
                        data: null, // Using null here to pass multiple parameters to the render function
                        name: 'id',
                        title: 'Action',
                        width: 100,
                        render: function(data, type, row, meta) {
                            // var viewButton =
                            //     '<button name="btn-view" id="btn-view" class="btn btn-primary btn-sm btn-view" data-staff_id="' +
                            //     data.id +
                            //     '" data-staff_name="' + data.staff_name +
                            //     '" data-staff_amount="' + data.staff_amount +
                            //     '" data-staff_status="' + data.staff_status +
                            //     '">View</button>';
                            var editButton =
                                '<button id="btn-edit" class="btn btn-danger btn-sm btn-edit" data-id="' +
                                data.id +
                                '" data-staff_id="' + data.staff_id +
                                '" data-staff_name="' + data.name +
                                '" data-staff_status="' + data.status +
                                '">Edit</button>';
                            // return viewButton + ' | ' + editButton;
                            return editButton;
                        }
                    }
                ]
            });


            // ========================================= Add Model Show Cmd Start Here ============================

            $('#add_new_btn').on('click', function() {

                // Call Modal add
                $('#addStaffDetails').modal('show');
                $('#staff-add-form')[0].reset(); //reset form

            });

            // ========================================= Add Model Show Cmd End Here ============================

            // ========================================= Edit Model Show Cmd Start Here ============================

            $('#data-table').on('click', '.btn-edit', function() {

                $('#staff-edit-form')[0].reset(); //reset form

                // get data from button edit

                var id = $(this).data('id');
                var staff_id = $(this).data('staff_id');
                var staff_name = $(this).data('staff_name');
                var staff_status = $(this).data('staff_status');


                // Set data to Form edit
                $('#edit_txt_id').val(id);
                $('#edit_txt_staff_id').val(staff_id);
                $('#edit_txt_staff_name').val(staff_name);
                $('#edit_txt_staff_status').val(staff_status);


                // Call Modal edit
                $('#editStaffDetails').modal('show');


            });

            // ========================================= Edit Model Show Cmd End Here ============================



            // ========================================= Staff Add Cmd End Here ============================

            $("#staff-add-form").submit(function(event) {

                $('#add-submit-btn').prop('disabled', true);
                event.preventDefault();


                $.ajax({
                    url: "{{ route('staff.add') }}", //backend url
                    data: $("#staff-add-form")
                        .serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function(response) {
                        // console.log(response); //error occurs

                        if (response.success == true) {
                            var message = response.message;
                            $('#addModal').modal('hide');

                            $.confirm({
                                title: 'Save',
                                content: message,
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    btnOk: {
                                        text: 'Ok',
                                        btnClass: 'btn-success',
                                        action: function() {
                                            location.reload();
                                        }
                                    }
                                }
                            });
                        } else {
                            // console.log('Red');

                            var errors = response.responseJSON.errors;
                            var errorHtml = '';

                            $.each(errors, function(key, value) {
                                errorHtml += value + '<br>';
                            });

                            $.confirm({
                                title: 'Error',
                                content: errorHtml,
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    btnOk: {
                                        text: 'Ok',
                                        btnClass: 'btn-danger',
                                        action: function() {
                                            // location.reload();
                                            $('#add-submit-btn').prop(
                                                'disabled',
                                                false);
                                        }
                                    }
                                }
                            });

                        }

                    },
                    error: function(response) {
                        console.log(response); //error occurs
                        console.log(response.responseJSON.errors); //error occurs
                        $('#add-submit-btn').prop('disabled', false);


                        var errors = response.responseJSON.errors;
                        var errorHtml = '';

                        $.each(errors, function(key, value) {
                            errorHtml += value + '<br>';
                        });

                        $.confirm({
                            title: 'Error',
                            content: errorHtml,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                btnOk: {
                                    text: 'Ok',
                                    btnClass: 'btn-danger',
                                    action: function() {
                                        // location.reload();
                                        $('#add-submit-btn').prop(
                                            'disabled',
                                            false);
                                    }
                                }
                            }
                        });
                    }
                });

            });

            // ========================================= Staff Add Cmd End Here ============================


            // ========================================= Staff Edit Cmd End Here ============================

            $("#staff-edit-form").submit(function(event) {

                $('#edit-submit-btn').prop('disabled', true);
                event.preventDefault();


                $.ajax({
                    url: "{{ route('staff.edit') }}", //backend url
                    data: $("#staff-edit-form")
                        .serialize(), //sending form data in a serialize way
                    type: "post",
                    async: false, //hold the next execution until the previous execution complete
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); //error occurs

                        if (response.success == true) {
                            var message = response.message;
                            $('#editModal').modal('hide');

                            $.confirm({
                                title: 'Save',
                                content: message,
                                type: 'green',
                                typeAnimated: true,
                                buttons: {
                                    btnOk: {
                                        text: 'Ok',
                                        btnClass: 'btn-success',
                                        action: function() {
                                            location.reload();
                                        }
                                    }
                                }
                            });
                        } else {
                            // console.log('Red');

                            var errors = response.responseJSON.errors;
                            var errorHtml = '';

                            $.each(errors, function(key, value) {
                                errorHtml += value + '<br>';
                            });

                            $.confirm({
                                title: 'Error',
                                content: errorHtml,
                                type: 'red',
                                typeAnimated: true,
                                buttons: {
                                    btnOk: {
                                        text: 'Ok',
                                        btnClass: 'btn-danger',
                                        action: function() {
                                            // location.reload();
                                            $('#edit-submit-btn').prop(
                                                'disabled',
                                                false);
                                        }
                                    }
                                }
                            });

                        }

                    },
                    error: function(response) {
                        console.log(response); //error occurs
                        // console.log(response.responseJSON.errors); //error occurs
                        $('#edit-submit-btn').prop('disabled', false);


                        var errors = response.responseJSON.errors;
                        var errorHtml = '';

                        $.each(errors, function(key, value) {
                            errorHtml += value + '<br>';
                        });

                        $.confirm({
                            title: 'Error',
                            content: errorHtml,
                            type: 'red',
                            typeAnimated: true,
                            buttons: {
                                btnOk: {
                                    text: 'Ok',
                                    btnClass: 'btn-danger',
                                    action: function() {
                                        // location.reload();
                                        $('#edit-submit-btn').prop(
                                            'disabled',
                                            false);
                                    }
                                }
                            }
                        });
                    }
                });

            });

            // ========================================= Staff Edit Cmd End Here ============================






        });
    </script>
@endsection
