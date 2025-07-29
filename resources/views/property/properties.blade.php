@extends('layouts.default')
@section('content')
<section class="inner-banner-img">
    <div class="container">
    <div class="row d-flex">
    <div class="col-lg-12 col-md-12 col-sm-12">{{Request::path()}}</div>
    </div>
    </div>
</section>
<section id="our-services" class="padding_half bglight">
    <div class="container">
        <div id="pagination-container" ></div>
        <div id="services-measonry" class="cbp">
        @foreach ($result as $rw )
			<div class="cbp-item ">
                <div class="services-main">
                    <div class="image bottom10">
                        <div class="image"><img alt="SE" src="{{ asset('storage/'.$rw->image)}}"></div>
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
