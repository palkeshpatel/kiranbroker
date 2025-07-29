@extends('layouts.default')
@section('content')
<section class="inner-banner-img">
    <div class="container">
    <div class="row d-flex">
    <div class="col-lg-12 col-md-12 col-sm-12">
              @if (last(request()->segments())=='available')
                        available properties
            @elseif(last(request()->segments())=='past')
                        past properties
            @elseif(last(request()->segments())=='Investment-opportunities')
                        investment opportunities properties 123
            @else
            @endif
    </div>
    </div>
    </div>
</section>
<section  class="padding_half ">
    <div class="container">

        <div class="row d-flex">
            <div class="list-wrapper service_listing_bg">
            @if (last(request()->segments())=='available')
               {{-- \App\Helpers\HtmlComponent::service() --}}

               
 @foreach ($FullPropertyDetail as $rw )
                <div class="list-item">
                <div class="card property-list col-lg-12 col-md-12 col-sm-12">
                    <div class="row g-0">
                    <div class="col-md-4"><img class="img-fluid" src="{{ ($rw->Image=='')?asset('images/properties1.jpg'):asset('storage/'.$rw->Image) }}" alt="kiran broker" width="350" height="200"></div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h5 class="card-title font-bold">{{$rw->name}}</h5>
                            <p class="card-text">{{$rw->consultant}}</p>
                            <p class="card-text"><small class="text-muted property-details-title">Type:</small> <small class="text-muted property-details-info">{{$rw->property_type_name}}</small></p>
                       
                            <!-- <a   class="btn btn-primary" href="{{ url('agreement-form/'.$rw->slug) }}" >DOWNLOAD BROCHURE</a> -->
                            <a   class="btn btn-primary" href="{{ url('/download-brochure?subject=') }}{{$rw->name}}" >DOWNLOAD BROCHURE</a>
                        </div>
                    </div>
                    <div class="col-md-4 text-end" >
                        <div class="card-body ">
                            <h5 class="card-title font-bold d-none">₹ {{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $rw->amount) }}</h5>
                            <a class="btn btn-outline-primary " style="display: {{ ($rw->property_status_name)??'none' }}">Available</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                @endforeach

            @else
            <div id="pagination-container"></div>
                @foreach ($FullPropertyDetail as $rw )
                <div class="list-item">
                <div class="card property-list col-lg-12 col-md-12 col-sm-12">
                    <div class="row g-0">
                    <div class="col-md-4"><img class="img-fluid" src="{{ ($rw->Image=='')?asset('images/properties1.jpg'):asset('storage/'.$rw->Image) }}" alt="kiran broker" width="350" height="200"></div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <h5 class="card-title font-bold">{{$rw->name}}</h5>
                            <p class="card-text">{{$rw->consultant}}</p>
                            <p class="card-text"><small class="text-muted property-details-title">Type:</small> <small class="text-muted property-details-info">{{$rw->property_type_name}}</small></p>
                        @if( $rw->is_agreement )
                            <a   class="btn btn-primary" href="{{ url('agreement-form/'.$rw->slug) }}" >Agreement</a>
                        @endif
                        </div>
                    </div>
                    <div class="col-md-4 text-end" >
                        <div class="card-body ">
                            <h5 class="card-title font-bold d-none">₹ {{ preg_replace("/(\d+?)(?=(\d\d)+(\d)(?!\d))(\.\d+)?/i", "$1,", $rw->amount) }}</h5>
                            <a class="btn btn-outline-primary " style="display: {{ ($rw->property_status_name)??'none' }}">{{$rw->property_status_name}}</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                @endforeach
            @endif

            </div>
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
    var perPage = 10;

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
