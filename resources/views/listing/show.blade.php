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
        <div class="verified-badge with-tip margin-bottom-30" data-tip-content="Listing has been verified and belongs business owner or manager."> <i class="sl sl-icon-check"></i> Now Available</div>
        <div class="utf_box_widget booking_widget_box">
          <h3><i class="fa fa-calendar"></i> Booking
			<div class="price">
				<span>185$<small>person</small></span>				
			</div>
		  </h3>
          <div class="row with-forms margin-top-0">
            <div class="col-lg-12 col-md-12 select_date_box">
              <input type="text" id="date-picker" placeholder="Select Date" readonly="readonly">
			  <i class="fa fa-calendar"></i>
            </div>
  		    <div class="col-lg-12">
				<div class="panel-dropdown time-slots-dropdown">
					<a href="#">Choose Time Slot...</a>
					<div class="panel-dropdown-content padding-reset">
						<div class="panel-dropdown-scrollable">
							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-1">
								<label for="time-slot-1">
									<strong><span>1</span> : 8:00 AM - 8:30 AM</strong>									
								</label>
							</div>
							
							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-2">
								<label for="time-slot-2">
									<strong><span>2</span> : 8:30 AM - 9:00 AM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-3">
								<label for="time-slot-3">
									<strong><span>3</span> : 9:00 AM - 9:30 AM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-4">
								<label for="time-slot-4">
									<strong><span>4</span> : 9:30 AM - 10:00 AM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-5">
								<label for="time-slot-5">
									<strong><span>5</span> : 10:00 AM - 10:30 AM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-6">
								<label for="time-slot-6">
									<strong><span>6</span> : 13:00 PM - 13:30 PM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-7">
								<label for="time-slot-7">
									<strong><span>7</span> : 13:30 PM - 14:00 PM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-8">
								<label for="time-slot-8">
									<strong><span>8</span> : 14:00 PM - 14:30 PM</strong>
								</label>
							</div>
							
							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-9">
								<label for="time-slot-9">
									<strong><span>9</span> : 15:00 PM - 15:30 PM</strong>
								</label>
							</div>
							
							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-10">
								<label for="time-slot-10">
									<strong><span>10</span> : 16:00 PM - 16:30 PM</strong>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="panel-dropdown">
					<a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>
					<div class="panel-dropdown-content">
						<div class="qtyButtons">
							<div class="qtyTitle">Adults</div>
							<input type="text" name="qtyInput" value="1">
						</div>
						<div class="qtyButtons">
							<div class="qtyTitle">Childrens</div>
							<input type="text" name="qtyInput" value="1">
						</div>
					</div>
				</div>
			</div>
			<div class="with-forms margin-top-0">
				<div class="col-lg-12 col-md-12">
					<select class="utf_chosen_select_single" >
					  <option label="Select Time">Select Time</option>
					  <option>Lunch</option>
					  <option>Dinner</option>					  
					</select>
				</div>
			</div>	
          </div>          
		  <a <a href="listing_booking.html" class="utf_progress_button button fullwidth_block margin-top-5">Request Booking</a>
		  <button class="like-button add_to_wishlist"><span class="like-icon"></span> Add to Wishlist</button>
          <div class="clearfix"></div>
        </div>

        <div class="utf_box_widget opening-hours margin-top-35">
          <h3><i class="sl sl-icon-clock"></i> Business Hours</h3>
          <ul>
            <li>Monday <span>09:00 AM - 09:00 PM</span></li>
            <li>Tuesday <span>09:00 AM - 09:00 PM</span></li>
            <li>Wednesday <span>09:00 AM - 09:00 PM</span></li>
            <li>Thursday <span>09:00 AM - 09:00 PM</span></li>
            <li>Friday <span>09:00 AM - 09:00 PM</span></li>
            <li>Saturday <span>09:00 AM - 10:00 PM</span></li>
            <li>Sunday <span>09:00 AM - 10:00 PM</span></li>
          </ul>
        </div>	

 
		<div class="utf_box_widget opening-hours margin-top-35">
          <h3><i class="sl sl-icon-info"></i> Google AdSense</h3>
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
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=fa"></script> 

<script src="{{ asset('js/layout/infobox.min.js') }}"></script>
<script src="{{ asset('js/layout/markerclusterer.js') }}"></script>
<script src="{{ asset('js/layout/maps.js') }}"></script>
<script src="{{ asset('js/layout/quantityButtons.js') }}"></script>
<script src="{{ asset('js/layout/moment.min.js') }}"></script>
<script src="{{ asset('js/layout/daterangepicker.js') }}"></script>

<script>
$(function() {
	$('#date-picker').daterangepicker({
		"opens": "left",
		singleDatePicker: true,
		isInvalidDate: function(date) {
		var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
		var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
		return date.isAfter(disabled_start) && date.isBefore(disabled_end);
		}
	});
});

$('#date-picker').on('showCalendar.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-animated');
});
$('#date-picker').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#date-picker').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});

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
</script>
@endsection