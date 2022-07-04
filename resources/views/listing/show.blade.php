@extends('layouts.app')
@section('seo_title', $listing->name)
@section('content')

@php
	$gallary = $listing->getMeta('thumbnail_id');
@endphp
@if($gallary->count() > 1)
<div id="utf_listing_gallery_part" class="utf_listing_section">
    <div class="utf_listing_slider utf_gallery_container margin-bottom-0"> 
		@foreach($gallary as $image)
		<a href="{{get_image($image->meta_value)}}" data-background-image="{{get_image($image->meta_value)}}" class="item utf_gallery"></a> 
		@endforeach
	</div>
  </div>   
@endif
  <div class="container">
    <div class="row utf_sticky_main_wrapper">
      <div class="col-lg-8 col-md-8">
        <div id="titlebar" class="utf_listing_titlebar">
          <div class="utf_listing_titlebar_title">
           <h2>{{$listing->name}} <span class="listing-tag">{{$listing->service->title}}</span></h2>		   
            <span> <a href="#utf_listing_location" class="listing-address">{{$listing->address}} <i class="sl sl-icon-location"></i></a> </span>			
			<span class="call_now">{{$listing->user->phone}} <i class="sl sl-icon-phone"></i></span>
            <ul class="listing_item_social">
				@foreach($listing->meta()->where('meta_key', 'LIKE' , '%social_%')->get() as $social)
              		<li><a href="{{$social->meta_value}}">{{__('app.' . substr( $social->meta_key, 7 )) }} <i class="fa fa-{{substr( $social->meta_key, 7 )}}"></i></a></li>
			  	@endforeach
			  <li><a href="#booking" class="now_open">{{__('app.Booking now')}}</a></li>
            </ul>			
          </div>
        </div>
        <div id="utf_listing_overview" class="utf_listing_section">
          <h3 class="utf_listing_headline_part margin-top-30 margin-bottom-30">{{__('app.Listing Description')}}</h3>
			{!! $listing->content !!}
		  <div id="utf_listing_tags" class="utf_listing_section listing_tags_section margin-bottom-10 margin-top-0">          
		   @if($listing->getMeta('fixed_phone', true))
		   	<a href="tel:{{$listing->getMeta('fixed_phone', true)}}"><i class="sl sl-icon-phone" aria-hidden="true"></i> {{$listing->getMeta('fixed_phone', true)}}</a>				
		   @endif
		   @if($listing->getMeta('site_link', true))
			<a rel="nofollow" href="{{$listing->getMeta('site_link', true)}}"><i class="sl sl-icon-globe" aria-hidden="true"></i> {{$listing->getMeta('site_link', true)}}</a>			
			@endif
		  </div>		  		 
        </div>
		
		<div id="utf_listing_tags" class="utf_listing_section listing_tags_section">
          <h3 class="utf_listing_headline_part margin-top-30 margin-bottom-40">{{__('app.Listings Service')}}</h3>
			@foreach($listing->services as $service)
				<a href="{{route('service.show', $listing->service->id)}}"><i class="fa fa-tag" aria-hidden="true"></i> {{$service->subService->title}}</a>
			@endforeach
        </div>
        
        <div class="utf_listing_section">
          <div class="margin-top-50">
            <div class="utf_pricing_list_section">
              <h4>{{__('app.Pricing')}}</h4>
              <ul>
				@foreach($listing->services as $service)
                <li>
                  <h5>{{$service->subService->title}}</h5>
                  <span>{{get_listing_service_price($service)}}</span> 
				</li>
				@endforeach
              </ul>
            </div>
          </div>
		</div>

		@php 
			$map = explode(',', $listing->getMeta('map', true));
		@endphp
		@if(count($map) == 2)
        <div id="utf_listing_location" class="utf_listing_section">
          <h3 class="utf_listing_headline_part margin-top-60 margin-bottom-40">{{__('app.Location on map')}}</h3>
          <div id="utf_single_listing_map_block">
            <div id="utf_single_listingmap" data-latitude="{{$map[0]}}" data-longitude="{{$map[1]}}" data-map-icon="im im-icon-Map2"></div>
		</div>
        </div>
		@endif 
		@include('partials.global.comments-section', ['item' => $listing, 'type' => 'listing'])
      </div>
      
      <!-- Sidebar -->
      <div class="col-lg-4 col-md-4 margin-top-75 sidebar-search" id="booking">
		@if($avaliable)
        <div class="verified-badge margin-bottom-30"> <i class="sl sl-icon-check"></i> {{__('app.Now open')}}</div>
        @else
		<div class="verified-badge close margin-bottom-30"> <i class="sl sl-icon-close"></i> {{__('app.Not open')}}</div>
		@endif
		<div class="utf_box_widget booking_widget_box">
          <h3><i class="fa fa-calendar"></i> {{__('app.Booking')}}
		  </h3>
          <form id="booking-form" class="row with-forms margin-top-0" action="{{route('user.booking.store')}}" method="post">
			@csrf
			<input type="hidden" name="listing_id" value="{{$listing->id}}">
			<div class="col-lg-12 col-md-12 select_subservice_box margin-bottom-20">
				<select name="service[]" required multiple  data-count-selected-text="موارد انتخاب شده {0} تا"  data-placeholder="{{__('app.Choose items')}}" class="selectpicker default category" title="{{__('app.Choose items')}}" data-live-search="true" data-selected-text-format="count" data-size="5">
					@foreach($listing->services as $service)
						<option value="{{$service->id}}">{{$service->subservice->title}}</option>
					@endforeach
				</select>
			</div>
            <div class="col-lg-12 col-md-12 select_date_box">
              <input type="text" id="date-picker" name="date" required class="booking-date-picker" data-jdp placeholder="{{__('app.Select Date')}}" readonly="readonly">
			  <i class="fa fa-calendar"></i>
            </div>
  		    <div class="col-lg-12">
				<div class="panel-dropdown time-slots-dropdown">
					<a href="#">{{__('app.Choose Time Slot...')}}</a>
					<div class="panel-dropdown-content padding-reset">
						<div class="panel-dropdown-scrollable"></div>
					</div>
				</div>

				<div class="errors alert alert-danger">
					<ul>
		
					</ul>
				</div>

				@guest
				<div class="d-none guest-show">
					<a href="#dialog_signin_part" data-close="true" data-redirect="false" data-callback="applybooking" class="button login-button popup-with-zoom-anim">{{__('app.Request Booking')}}</a>
				</div>
			@endguest 
			<button class="utf_progress_button button fullwidth_block margin-top-5 @guest guest-none  @endguest">{{__('app.Request Booking')}}</button>  
			</form>
          </div>
			<div class="clearfix"></div>  
        </div>

        <div class="utf_box_widget opening-hours margin-top-35">
          <h3><i class="sl sl-icon-clock"></i> {{__('app.Business Hours')}}</h3>
          <ul>
            @foreach($times as $time)
			<li>{{__('app.'.$time->week_day)}} <span>از {{str_replace(['|',','],[' تا ',' و از '], $time->weekdaytime)}}</span></li>
			@endforeach
          </ul>
        </div>	

 
		<div class="utf_box_widget opening-hours margin-top-35">
          <h3><i class="sl sl-icon-info"></i> {{__('app.Ads place')}}</h3>
          <span><img src="/images/google_adsense.jpg" alt="" /></span>
        </div>

      </div>
    </div>
  </div>
  
  <section class="fullwidth_block padding-top-20 padding-bottom-50">
    <div class="container">
      <div class="row slick_carousel_slider">
        <div class="col-md-12">
          <h3 class="headline_part centered margin-bottom-25">{{__('app.Similar Listings')}}</h3>
        </div>		
		<div class="row">
			<div class="col-md-12">
				<div class="simple_slick_carousel_block utf_dots_nav"> 
				@include('partials.listing.listings-grid-layout', ['listings' => $similarListings, 'slide' => true])
				</div>
			  </div>
		  </div>
	   </div>
    </div>
  </section>
  

@endsection


@section('scripts')
<!-- Maps --> 
<link rel="stylesheet" href="{{ asset('css/layout/jalalidatepicker.min.css') }}">
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=fa"></script> 

<script src="{{ asset('js/layout/maps.js') }}"></script>
<script src="{{ asset('js/layout/jalalidatepicker.min.js') }}"></script>

<script>

function close_panel_dropdown() {
$('.panel-dropdown').removeClass("active");
	$('.fs-inner-container.content').removeClass("faded-out");
}
$('.panel-dropdown a').on('click', function(e) {
	if ($(this).parent().is(".active")) {
		close_panel_dropdown();
	} else {
		close_panel_dropdown();
		$(this).parent().addClass('active');
		$('.fs-inner-container.content').addClass("faded-out");
	}
	e.preventDefault();
});
$('.panel-buttons button').on('click', function(e) {
	$('.panel-dropdown').removeClass('active');
	$('.fs-inner-container.content').removeClass("faded-out");
});
var mouse_is_inside = false;
$('.panel-dropdown').hover(function() {
	mouse_is_inside = true;
}, function() {
	mouse_is_inside = false;
});
$("body").mouseup(function() {
	if (!mouse_is_inside) close_panel_dropdown();
});

jalaliDatepicker.startWatch({
	separatorChar: "-"
});

$('.booking-date-picker').on('change', getTimeSlots)
$('.select_subservice_box select').on('change', getTimeSlots)

function getTimeSlots(){
	var date = $('.booking-date-picker').val()
	var services = $('.select_subservice_box select').val()
	var token = $('input[name="_token"]').val()
	var listing_id = $('input[name="listing_id"]').val()

	$.post( "{{route('listing.get_times')}}", { date: date, services: services, _token: token, listing_id: listing_id }).done(function( res ) {
		$('.panel-dropdown-scrollable').html('')
		$('.errors ul').html('')

		if(res.errors){
			var errorsHtml = '';
			for(var error of Object.values(res.errors)){
				errorsHtml += `<li>${error}</li>`
			}

			$('.errors ul').append(errorsHtml)
			return
		}

		if(res.data){
			
			var html = '';
			var counter = 1;
			for(var stlotime of Object.values(res.data)){
				html += `
						<div class="time-slot">
							<input type="radio" value="${stlotime.time_start}|${stlotime.time_end}" name="time_slot" id="time-slot-${stlotime.time_start}">
							<label for="time-slot-${stlotime.time_start}">
								<strong><span>${counter++}</span> از ساعت ${stlotime.time_start} تا ساعت ${stlotime.time_end}</strong>									
							</label>
						</div>
				`
				counter++
			}
			$('.panel-dropdown-scrollable').html(html)
		}

  	});
}

$('#booking-form').on('submit', function(e){
	if(!$('input[name="time_slot"]') || !$('input[name="time_slot"]').is(':checked')){
		e.preventDefault()
	}
})

function applybooking(){
	$('#booking-form').submit()
}
</script>
@endsection