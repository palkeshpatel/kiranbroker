@extends('layouts.default')
@section('content')
<section class="inner-banner-img">
    <div class="container">
        <div class="row d-flex">
        <div class="col-lg-12 col-md-12 col-sm-12">{{   $PropertyDetail->title  }}</div>
        </div>
    </div>
</section>
<div class="invest_detail_about_section">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 col-sm-12">

             <div class="property_detail_left_thumb"><img class="img-fluid" src="{{ ($PropertyDetail->image!='')?asset('storage/'.$PropertyDetail->image):asset('images/properties1.jpg')}}"  alt="investment" /></div>
          </div>
          <div class="col-lg-6 col-sm-12">
             <div class="property_about_right">
                <h3 class="property_detail_title">{{ $PropertyDetail->title }}</h3>
                <p class="desc">{{ $PropertyDetail->discription }}</p>

             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="amenities_section_bg">
    <div class="container">
       <div class="row">
          <div class="col-lg-6 col-sm-12">
             <div class="amenities_left_part">
                <h3 class="property_detail_title">Amenities</h3>
                <div class="amenitis_icon_box_bg">

				@if(!empty($Amenity))

                   @foreach (json_decode($Amenity->images) as $amenity_rw)
					   <div class="amenitis_icon_box">
						  <img class="img-fluid"  src="{{ asset('storage/'.$amenity_rw->name)}}" alt="icon" />
						  <p>{{ $amenity_rw->title }}</p>
					   </div>
				   @endforeach
				@endif
                </div>
             </div>
          </div>
          <div class="col-lg-6 col-sm-12">
             <div class="amenities_slider_part">
                <div id="amenities_slider" class="owl-carousel">
				@if(!empty($PropertyDetail->gallery_images))
				   @foreach (json_decode($PropertyDetail->gallery_images) as $rw)
					   <div class="item"><img class="img-fluid" src="{{ asset('storage/'.$rw)}}" alt="amenities" /></div>
				   @endforeach
				@endif
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
 <div class="property_gallery_section_bg">
    <div class="container">
       <h3 class="property_detail_title">Our Gallery</h3>
       <div class="property_gallery_box_bg">
		  @foreach (json_decode($Gallery->images) as $gallery_rw)
            <div class="property_gallery_box">
				<a href="{{ asset('storage/'.$gallery_rw->name)}}" data-fancybox="" data-caption="Title Caption"> <img class="img-fluid"  src="{{ asset('storage/'.$gallery_rw->name)}}" alt="thumb" /> </a>
			</div>
          @endforeach
	   </div>
    </div>
 </div>
 <div class="property_contact_section_bg">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <h3 class="property_detail_title">Our Location</h3>
          </div>
       </div>
       <div class="row">
		{!! $PropertyDetail->location	!!}
       </div>
    </div>
 </div>
@section('style')

@stop
@section('script')

@stop

@stop
