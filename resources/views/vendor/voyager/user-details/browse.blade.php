@extends('voyager::master')

@section('page_header')
    <div class="container-fluid">

        <h1 class="page-title">
            <i class="voyager-people"></i>
            User Details
        </h1>
    </div>
@stop
@section('content')
    <div class="container contact">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="text-right" style="margin-bottom: 20px;">
                        <a href="{{ url('admin/email') }}" class="btn btn-primary">Send Email</a>
                        <button type="button" name="add" id="addRecord" class="btn btn-success">Add New Record</button>
                    </div>
                    <div class="table-responsive">
                        <table id="UserTable" class="display table">
                            <thead>
                                <tr>
                                    <th>SrNo.</th>
                                    <th>Property Name</th>
                                    <th>Person Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Industry</th>
                                    <th>Hotel Brand</th>
                                    <th>Phone</th>
                                    <th>State</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->property_name }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->city }}</td>
                                        <td>{{ $user->industry }}</td>
                                        <td>{{ $user->hotel_brand }}</td>
                                        <td>{{ $user->phone }}</td>
                                        <td>{{ $user->state }}</td>
                                        <td>
                                            <button type="button" name="update" id="{{ $user->id }}"
                                                class="btn btn-warning btn-xs update">Edit</button>
                                        </td>
                                        <td>

                                            <form action="{{ url('admin/users-details/' . $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="delete"
                                                    class="btn btn-danger btn-xs">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>SrNo.</th>
                                    <th>Property Name</th>
                                    <th>Person Name</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>Industry</th>
                                    <th>Hotel Brand</th>
                                    <th>Phone</th>
                                    <th>State</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div id="recordModal" class="modal fade">
            <div class="modal-dialog">
                <form method="post" id="userDetailForm" action="admin/user-store">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-plus"></i> Add New Record</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="property_name" class="control-label">Property Name</label>
                                <input type="text" class="form-control" id="property_name" name="property_name"
                                    placeholder="Property Name">
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label">Person Name <span
                                        style="color: red">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Person Name">
                            </div>
                            <div class="form-group">
                                <label for="email" class="control-label">Email <span style="color: red">*</span></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="address" class="control-label">Address</label>
                                <textarea name="address" id="address" cols="5" rows="5" placeholder="Address" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="city" class="control-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="City">
                            </div>
                            <div class="form-group">
                                <label for="industry" class="control-label">Industry Type:</label>
                                <select class="js-example-basic-single" multiple="multiple" name="industry[]" id="industry"
                                    style="width: 150px">
                                    <option value="Hotel">Hotel</option>
                                    <option value="Gas station">Gas station</option>
                                    <option value="Retail business">Retail business</option>
                                    <option value="Construction">Construction</option>
                                    <option value="Architech">Architech</option>
                                    <option value="Vendor">Vendor</option>
                                    <option value="Attorney">Attorney</option>
                                    <option value="Medical">Medical</option>
                                    <option value="Corporate">Corporate</option>
                                    <option value="Lender">Lender</option>
                                    <option value="Broker">Broker</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hotel_brand" class="control-label">Hotel Brand</label>
                                <input type="text" class="form-control" id="hotel_brand" name="hotel_brand"
                                    placeholder="Hotel Brand">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="control-label">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="state" class="control-label">State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="State">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" id="id" />
                            <input type="hidden" name="action" id="action" value="" />
                            <input type="submit" name="save" id="save" class="btn btn-info" value="Save" />
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .card {
            border: 1px solid #ccc !important;
        }

    </style>
@stop

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" rel="stylesheet" />
    <script>
        $(document).ready(function() {
            $("#industry").select2({
                placeholder: "Select Industry Type",
                allowClear: true
            });
        });
    </script>
    <script>
        if ($("#userDetailForm").length > 0) {
            $("#userDetailForm").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    phone: {
                        number: true
                    },
                    email: {
                        required: true,
                        email: true,
                        remote: '/admin/validate-email'
                    },
                },
                messages: {
                    name: {
                        required: "Please enter name"
                    },
                    email: {
                        required: "Please enter email",
                        email: "Please enter valid email",
                        remote:"This email already exist"
                    },
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#save').html('Please Wait...');
                    $("#save").attr("disabled", true);
                    $.ajax({
                        url: $(this).attr("action"),
                        type: "POST",
                        data: $('#userDetailForm').serialize(),
                        success: function(response) {
                            $('#save').html('Submit');
                            $("#save").attr("disabled", false);
                            $("#industry").val('').trigger('change');
                            Swal.fire('Your Details is Submitted Successfully');
                            document.getElementById("userDetailForm").reset();
                            location.reload();
                        }
                    });
                }
            })
        }
    </script>

    <script>
        $(document).ready(function() {
            $('#UserTable').DataTable({
                "pagingType": "full_numbers",
                "order": [0,"desc"]
            });

            $('#addRecord').click(function() {
                $('#recordModal').modal('show');
                $('#recordForm')[0].reset();
                $('.modal-title').html("<i class='fa fa-plus'></i> Add Record");
                $("#industry").val('Other').trigger('change');
                $('#action').val('addRecord');
                $('#save').val('Add');
            });
            $("#UserTable").on('click', '.update', function() {
                var id = $(this).attr("id");

                $.ajax({
                    url: '/admin/user-edit',
                    method: "GET",
                    data: {
                        id: id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#recordModal').modal('show');
                        $('#id').val(data.id);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);

                        $('#property_name').val(data.property_name);
                        $('#address').val(data.address);
                        $('#city').val(data.city);
                        $('#state').val(data.state);
                        $('#hotel_brand').val(data.hotel_brand);

                        $("#industry").select2().val(data.industry.split(',')).trigger(
                            'change.select2');

                        $('.modal-title').html("<i class='fa fa-plus'></i> Edit Records");
                        $('#action').val('updateRecord');
                        $('#save').val('Update');
                    }
                })
            });
            $("#recordModal").on('submit', '#recordForm', function(event) {
                event.preventDefault();
                $('#save').attr('disabled', 'disabled');
                var formData = $(this).serialize();
                $.ajax({
                    url: 'admin/user-store',
                    method: "POST",
                    data: formData,
                    success: function(data) {
                        $('#recordForm')[0].reset();
                        $('#recordModal').modal('hide');
                        $('#save').attr('disabled', false);
                        dataRecords.ajax.reload();
                    }
                })
            });
            $("#UserTable").on('click', '#delete', function() {
                var id = $(this).attr("id");
                if (confirm("Are you sure you want to delete this record?")) {
                    $.ajax({
                        url: '/admin/users-details',
                        method: "POST",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            dataRecords.ajax.reload();
                        }
                    })
                } else {
                    return false;
                }
            });
        });
    </script>

@stop