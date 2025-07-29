@extends('voyager::master')
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-paper-plane"></i>
        Send Email to Users
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content browse container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="sendEmailForm" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="batch_no" name="batch_no" value="{{ $batch_no }}">
                            <div class="form-group">
                                <label for="to_email" class="control-label">To</label>
                                <select class="js-example-basic-single form-control" multiple="multiple" name="to_email[]"
                                    id="to_email">
                                    @foreach ($user as $users)
                                        <option value="{{ $users->email }}">{{ $users->email }}</option>
                                    @endforeach
                                </select>
                                <div class="btn btn-primary">
                                    <input type="checkbox" id="all">Select All
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subject" class="control-label">Subject</label>
                                        <input type="text" class="form-control" id="subject" name="subject"
                                            placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="brochure" class="control-label">Brochure</label>
                                        <input type="file" style="padding: 6px 10px 0 10px;" class="form-control"
                                            id="brochure" name="brochure">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <textarea name="description" id="description" cols="5" rows="5" placeholder="Description"
                                    class="form-control"></textarea>
                            </div>

                            <div><input type="submit" name="send_email" id="send_email" class="btn btn-info"
                                    value="Send" /></div>
                        </form>
                        <div id="message"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <style>
        .row>[class*=col-] {
            margin-bottom: 0;
        }

        .card-body {
            background: #d9d9d9;
        }

    </style>
@stop

@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script>
        $(document).ready(function() {
            $("#to_email").select2({
                placeholder: "Select Email",
                allowClear: true
            });
        });
        $("#all").click(function() {
            if ($("#all").is(':checked')) {
                $("#to_email > option").prop("selected", "selected");
                $("#to_email").trigger("change");
            } else {
                $("#to_email > option").removeAttr("selected");
                $("#to_email").trigger("change");
            }
        });
    </script>
    <script type="text/javascript">
        if ($("#sendEmailForm").length > 0) {
            $("#sendEmailForm").validate({
                rules: {
                    subject: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    subject: {
                        required: "Please Enter Subject"
                    },
                    description: {
                        required: "Please Enter Description"
                    },
                },
                submitHandler: function(form) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    SelectArray();
                }
            })
        }

        function SendEmail(to_email) {
            $("#send_email").attr("value","Processing...");
            $("#send_email").attr("disabled", true);
            let myForm = document.getElementById('sendEmailForm');
            let formData = new FormData();
            var csrf = $('meta[name="csrf-token"]').attr('content');
            var subject = $('#subject').val();
            var brochure = $('#brochure').get(0).files[0];
            var description = $('#description').val();
            var batch_no = $('#batch_no').val();

            formData.append('_token', csrf);
            formData.append('to_email', to_email);
            formData.append('subject', subject);
            formData.append('brochure', brochure);
            formData.append('description', description);
            formData.append('batch_no', batch_no);

            $.ajax({
                url: "{{ url('/admin/email-store') }}",
                type: "POST",
                data: formData,
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                success: (response) => {
                    $("#to_email").val('').trigger('change');
                    $("#message").html("<p><b>Please Wait Sending Email in Process " + response.count_send +
                        "</b></p>");
                    document.getElementById("sendEmailForm").reset();
                    $('#send_email').attr("value","Send");
                    $("#send_email").attr("disabled", false);
                },
            });
        }
        function SelectArray() {
            $('select[name="to_email[]"] option:selected').each(function(index, para) {
                SendEmail($(para).val());
            });
        }
    </script>

@stop
