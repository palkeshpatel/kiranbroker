<!--Services -->
@if ((count(Request::segments()))==0 || last(request()->segments())=='featured' )
<section class="padding_bottom_half">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 text-center bottom20">
            @if ( last(request()->segments())=='featured' )
                <p class="alert alert-danger no_property_list" style="display:none;">There are no Properties Listed yet!!</p>
            @endif
                <div class="heading-title darkcolor wow fadeInUp" data-wow-delay="300ms" style="visibility: visible;">
                    <h2 class="font-bold bottom30"> Services</h2>
                </div>
            </div>

            <div class="col-md-12">
                <div id="services-slider" class="owl-carousel services-slider-light">
                   @foreach ($services as $rw)
                     @php
                    $image=url('/storage')."/".$rw->bg_image;
                    @endphp
                   <div class="item" style="background-image:url('{{$image}}')">
                        <div class="service-box">
                            <span class="bottom25"><i class="{{$rw->icon_class}}"></i></span>
                            <h4 class="bottom10"><a href="/inquiry/">{{ $rw->title }}</a></h4>
                            <p>{{ $rw->description }}</p>
                           {{-- <a class="service-b" href="#">Read more <i class="fas fa-arrow-right"></i></a>--}}
                        </div>
                    </div>
                   @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@elseif  ((count(Request::segments()))==1)
@if (Request::segments()[0]=='services')
<section class="services-block bglight padding_top padding_bottom_half">
    <div class="container">
        <div class="row">
        @foreach ($services as $rw)
                <div class="col-lg-4 col-md-6 bottom20">
                    <div class="news_item shadow text-center text-md-left">
                        <div class="blog-img"><a href="/inquiry/" class="image" > <img class="img-responsive" src="{{ url('/storage')."/".$rw->bg_image}}" alt="Latest News" /> </a></div>
                        <div class="news_desc">
                            <h4 class="text-capitalize font-bold darkcolor bottom20"><a href="/inquiry/">{{ $rw->title}}</a></h4>
                            <p>{{ $rw->description }}</p>
                            {{-- <a class="button gradient-btn" href="#">Read more</a> --}}
                        </div>
                    </div>
                </div>
    @endforeach
</div>
    </div>
</section>
@endif
@endif
<!--Services ends-->
