@extends('layouts.default')
@section('content')
        <section class="inner-banner-img">
            <div class="container">
                <div class="row d-flex">
                 <div class="col-lg-12 col-md-12 col-sm-12">Projects</div>
                </div>
            </div>
        </section>
		<section class="padding_top_half padding_bottom investment_opportunities_section_bg">
			<div class="container">
			   @foreach ($projectMaster as $rw )
				<div class="row invest_listing_row">
					<div class="col-sm-6">
						<div class="investment_list_left_part">
							<div class="investment_list_thumb">
								<img src="{{ ($rw->image!='')?asset('storage/'.$rw->image):asset('images/properties1.jpg') }}"  class="img-fluid" alt="investment">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="investment_list_right_part">
							<h4>{{$rw->name}}</h4>
							<p>{{ $rw->short_description }}</p>
							<div class="pro_group_btn">
								<a  class="button gradient-btn" href="{{ url('projects_detail/'.$rw->slug) }}" >View More</a>
								<a  class="button gradient-btn join_meeting" href="https://lu.ma/03knke8s" target="_blank">Register Now</a>
								<a class="btn btn-outline-primary " href="{{ url('download-brochure?subject='.$rw->slug) }}" style="display: Sold">DOWNLOAD BROCHURE</a>
							</div>
						</div>
					</div>
				</div>
			   @endforeach
			</div>
		</section>
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

@stop
