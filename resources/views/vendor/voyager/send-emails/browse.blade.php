@extends('voyager::master')
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-paper-plane"></i>
        Send Emails
    </h1>
    @include('voyager::multilingual.language-selector')
@stop
@section('content')
    <div class="container contact">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="EmailTable" class="display table">
                            <thead>
                                <tr>
                                    <th>Batch No.</th>
                                    <th>Subject</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Brochure</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emails as $email)
                                    <tr>
                                        <td>{{ $email->batch_no }}</td>
                                        <td>{{ $email->subject }}</td>
                                        <td>{{ $email->to_email }}</td>
                                        <td>{{ $email->description }}</td>
                                        <td><a href="{{ asset('storage/' . $email->brochure) }}" target="_blank"
                                                style="text-decoration: none">{{ $email->brochure }}</a></td>
                                        <td><a href="{{ url('/admin/send-emails/' . $email->batch_no) }}"
                                                class="btn btn-primary" style="text-decoration: none;"><i
                                                    class="voyager-eye"></i></a>

                                            <form action="{{ url('/admin/send-emails/' . $email->batch_no) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="delete" data-batch={{ $email->batch_no }}
                                                    class="btn btn-danger btn-xs"><i class="voyager-trash"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Batch No.</th>
                                    <th>Subject</th>
                                    <th>Email</th>
                                    <th>Description</th>
                                    <th>Brochure</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('css')
    <style>
        .btn-danger {
            position: relative;
            top: 0px;
            left: 40px;
            padding: 6px;
            height: 27px;
            width: 27px;
        }

        .btn-primary {
            position: absolute;
            width: 27px;
            height: 27px;
            padding: 6px;
        }

    </style>
@stop
@section('javascript')
    <script>
        $(document).ready(function() {
            $('#EmailTable').DataTable({
                "pagingType": "full_numbers"
            });
        });
        $("#EmailTable").on('click', '#delete', function() {
            var id = $(this).attr("data-batch");
            if (confirm("Are you sure you want to delete this record?")) {
                $.ajax({
                    url: '/admin/send-emails',
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
    </script>

@stop
