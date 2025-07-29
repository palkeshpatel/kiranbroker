@extends('voyager::master')
@section('page_header')
    <h1 class="page-title">
        <i class="voyager-paper-plane"></i>
        View Send Email
    </h1>
    <a href="{{ url('/admin/send-emails') }}" class="btn btn-primary">Back</a>
    @include('voyager::multilingual.language-selector')
@stop
@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Batch No.</h3>
                    </div>

                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $emails->batch_no }}</p>
                    </div>
                    <hr style="margin:0;">
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Subject</h3>
                    </div>

                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $emails->subject }}</p>
                    </div>
                    <hr style="margin:0;">
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Email</h3>
                    </div>

                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $emails->to_email }}</p>
                    </div>
                    <hr style="margin:0;">
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Description</h3>
                    </div>

                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $emails->description }}</p>
                    </div>
                    <hr style="margin:0;">
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Brochure</h3>
                    </div>

                    <div class="panel-body" style="padding-top:0;">
                        <a href="{{ asset('storage/'.$emails->brochure) }}" target="_blank">{{ $emails->brochure }}</a>
                    </div>
                    <hr style="margin:0;">
                </div>
            </div>
        </div>
    </div>
@stop
