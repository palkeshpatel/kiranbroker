@extends('layouts.default')
@section('content')
<section class="inner-banner-img">
    <div class="container">
        <div class="row d-flex">
        <div class="col-lg-12 col-md-12 col-sm-12">{{   $projectMaster->title  }}</div>
        </div>
    </div>
</section>
<div class="invest_detail_about_section">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 col-sm-12">

             <div class="property_detail_left_thumb"><img class="img-fluid" src="{{ ($projectMaster->image!='')?asset('storage/'.$projectMaster->image):asset('images/properties1.jpg')}}"  alt="investment" /></div>
          </div>
          <div class="col-lg-6 col-sm-12">
             <div class="property_about_right">
                <h3 class="property_detail_title">{{ $projectMaster->name }}</h3>
                <p class="desc">{{ $projectMaster->short_description }}</p>

             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="amenities_section_bg">
    <div class="container">
       <div class="row">
          <div class="col-lg-12">
             <div class="amenities_left_part">
                <h3 class="property_detail_title">Specification</h3>
                <div class="">

                    {!! $projectMaster->long_description !!}
                </div>
             </div>
          </div>

       </div>
    </div>
 </div>


@section('style')

@stop
@section('script')

@stop

@stop
