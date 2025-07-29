
<section class="inner-banner-img">
    <div class="container">
	 <div id="pagination-container"></div>
    <div class="row d-flex">
    <div class="col-lg-12 col-md-12 col-sm-12">{{Request::path()}}</div>
    </div>
    </div>
    </section>

@if ((count(Request::segments()))==1)

<section id="our-services" class="padding_half bglight">
    <div class="container">

        <div id="pagination-container"></div>
        <div id="services-measonry" class="cbp">
        @foreach (\App\Models\PropertyClass::get() as $rw )
			<div class="cbp-item ">
                <div class="services-main">
                    <div class="image bottom10">
                        <div class="image"><img alt="SEO" src="{{ asset('storage/'.$rw->image)}}"></div>
                        <div class="overlay">
                            <a href="{{ url('properties/'.$rw->slug) }}" class="overlay_center border_radius"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="services-content brand text-center text-md-left">
                        <h4 class="bottom10 darkcolor text-center"><a href="{{ url('properties/'.$rw->slug) }}" >{{$rw->title}}</a></h4>
                    </div>
                </div>
            </div>
		@endforeach
		</div>
    </div>
</section>
@elseif  ((count(Request::segments()))==2)
	@if(Request::segments()[1]=="Investment-opportunities")
		<section class="padding_top_half padding_bottom investment_opportunities_section_bg">
			<div class="container">
			 <div id="pagination-container"></div>
				<div class="row invest_listing_row">
					<div class="col-sm-6">
						<div class="investment_list_left_part">							
							<div class="investment_list_thumb">
								<img src="../images/investment-opportunities-thumb.jpg" class="img-fluid" alt="investment">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="investment_list_right_part">
							<span>Simply dummy text</span>
							<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
							<a href="#" class="button gradient-btn">View more</a>
						</div>
					</div>
				</div>
				<div class="row invest_listing_row">
					<div class="col-sm-6">
						<div class="investment_list_left_part">							
							<div class="investment_list_thumb">
								<img src="../images/investment-opportunities-thumb.jpg" class="img-fluid" alt="investment">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="investment_list_right_part">
							<span>Simply dummy text</span>
							<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
							<a href="#" class="button gradient-btn">View more</a>
						</div>
					</div>
				</div>
				<div class="row invest_listing_row">
					<div class="col-sm-6">
						<div class="investment_list_left_part">							
							<div class="investment_list_thumb">
								<img src="../images/investment-opportunities-thumb.jpg" class="img-fluid" alt="investment">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="investment_list_right_part">
							<span>Simply dummy text</span>
							<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
							<a href="#" class="button gradient-btn">View more</a>
						</div>
					</div>
				</div>
				<div class="row invest_listing_row">
					<div class="col-sm-6">
						<div class="investment_list_left_part">							
							<div class="investment_list_thumb">
								<img src="../images/investment-opportunities-thumb.jpg" class="img-fluid" alt="investment">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="investment_list_right_part">
							<span>Simply dummy text</span>
							<h4>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</h4>
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries</p>
							<a href="#" class="button gradient-btn">View more</a>
						</div>
					</div>
				</div>
			</div>
		</section>
	@else
	<section  class="padding_half ">
		<div class="container">
			<div class="row d-flex">
				<div class="list-wrapper service_listing_bg">
				@foreach (\App\Views\FullPropertyDetail::where('property_class_slug',Request::segments()[1])->get() as $rw )
				<div class="list-item">

				<div class="card property-list col-lg-12 col-md-12 col-sm-12">
					<div class="row g-0">
					   <div class="col-md-4"><img class="img-fluid" src="{{ ($rw->image!='')?asset('storage/'.$rw->image):asset('images/properties1.jpg')}}" alt="123 kiran broker" width="350" height="200"></div>
					   <div class="col-md-4">
						  <div class="card-body">
							 <h5 class="card-title font-bold">{{$rw->name}}</h5>
							 <p class="card-text">{{$rw->consultant}}</p>
							 <p class="card-text"><small class="text-muted property-details-title">Type:</small> <small class="text-muted property-details-info">{{$rw->property_type_name}}</small></p>
						  </div>
					   </div>
					   <div class="col-md-4 text-end">
						  <div class="card-body ">
							 <h5 class="card-title font-bold d-none">₹ {{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $rw->amount) }}</h5>
							 <a class="btn btn-outline-primary ">{{$rw->property_status_name}}</a>
						  </div>
					   </div>
					</div>
				 </div>
				</div>
				@endforeach

	@if (\App\Views\FullPropertyDetail::where('property_class_slug',Request::segments()[1])->count()>=1)
	<div class="col-md-12 text-center">
		<div id="pagination-container"></div>
	</div>
	@endif

				</div>





			</div>
		</div>
	</section>
	@endif
@endif

@section('style')
<style>


.list-wrapper {
	padding: 15px;
	overflow: hidden;
}

.list-item {
	border: 1px solid #EEE;
	background: #FFF;
	margin-bottom: 10px;
	padding: 10px;
	box-shadow: 0px 0px 10px 0px #EEE;
}

.list-item h4 {
	color: #FF7182;
	font-size: 18px;
	margin: 0 0 5px;
}

.list-item p {
	margin: 0;
}

.simple-pagination ul {
	margin: 0 0 20px;
	padding: 0;
	list-style: none;
	text-align: center;
}

.simple-pagination li {
	display: inline-block;
	margin-right: 5px;
}

.simple-pagination li a,
.simple-pagination li span {
	color: #666;
	padding: 5px 10px;
	text-decoration: none;
	border: 1px solid #EEE;
	background-color: #FFF;
	box-shadow: 0px 0px 10px 0px #EEE;
}

.simple-pagination .current {
	color: #FFF;
	background-color: #FF7182;
	border-color: #FF7182;
}

.simple-pagination .prev.current,
.simple-pagination .next.current {
	background: #e04e60;
}
.service_listing_bg {
    width: 100%
}

.service_listing_bg .list-item {
    width: 100%
}
</style>
@stop
@section('script')
<script>
    // jQuery Plugin: http://flaviusmatis.github.io/simplePagination.js/

var items = $(".list-wrapper .list-item");
    var numItems = items.length;
    var perPage = 4;

    items.slice(perPage).hide();

    $('#pagination-container').pagination({
        items: numItems,
        itemsOnPage: perPage,
        prevText: "&laquo;",
        nextText: "&raquo;",
        onPageClick: function (pageNumber) {
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;
            items.hide().slice(showFrom, showTo).show();
        }
    });
</script>
@stop
