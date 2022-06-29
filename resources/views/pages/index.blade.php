@extends('layouts.app')
@section('seo_title', 'شرکت ایران')
@section('content')

<div class="search_container_block home_main_search_part main_search_block" data-background-image="images/city_search_background.jpg">
    <div class="main_inner_search_block">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>{{__('app.pages.index.Main page title')}}</h2>
            <h4>{{__('app.pages.index.Main page sub title')}}</h4>
            <form action="{{route('listing.index')}}">
				<div class="main_input_search_part">
					<div class="main_input_search_part_item intro-search-field">
						<select name="service" data-placeholder="{{__('app.pages.index.All category')}}" class="selectpicker default category" title="{{__('app.pages.index.All category')}}" data-live-search="true" data-selected-text-format="count" data-size="5">
							@foreach($categories as $cat)
							<optgroup label="{{$cat->title}}">
								@foreach($cat->services as $service)
									<option value="{{$service->id}}">{{$service->title}}</option>
								@endforeach
							</optgroup>
							@endforeach
						</select>
					</div>

					<div class="main_input_search_part_item">
						<div class="main_input_search_part_item intro-search-field">
							<select name="city" data-placeholder="{{__('app.pages.index.City')}}" class="selectpicker with-ajax default city" title="{{__('app.pages.index.City')}}" data-live-search="true" data-selected-text-format="count" data-size="5"></select>
						</div>
					</div>

				<button class="button">{{__('app.pages.index.Search')}}</button>
				</div>
			</form>
            <div class="main_popular_categories">
			  <h3>{{__('app.pages.index.Main page or sub title')}}</h3>

			  <ul class="main_popular_categories_list">
			  @foreach($categories->slice(0, 5) as $cat)
			  	<li> <a href="{{route('category.show', $cat->id)}}">
                  <div class="utf_box"> <i class="{{$cat->icon}}" aria-hidden="true"></i>
                    <p>{{$cat->title}}</p>					
                  </div>
                  </a> 
				</li>
				@endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </div>
  <div class="container">
	<div class="row">
      <div class="col-md-12">
        <h3 class="headline_part centered margin-top-75"> {{__('app.pages.index.Most Popular Categories')}}<span>{{__('app.pages.index.Browse the most desirable categories')}}</span></h3>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="container_categories_box margin-top-5 margin-bottom-30"> 
          	@foreach($services->slice(0, 10) as $service)
				<a href="{{route('service.show', $service->id)}}" class="utf_category_small_box_part"> <i class="{{$service->icon}}"></i>
					<h4>{{$service->title}}</h4>
					<span>{{$service->listings()->count()}}</span>
				</a> 
			@endforeach
		</div>
      </div>
	  <div class="col-md-12 centered_content"> <a href="{{route('service.index')}}" class="button border margin-top-20">{{__('app.View More')}}</a> </div>
    </div>
  </div>
  </div>
  <section class="fullwidth_block margin-top-65 padding-top-75 padding-bottom-70" data-background-color="#f9f9f9">
    <div class="container">
      <div class="row slick_carousel_slider">
        <div class="col-md-12">
          <h3 class="headline_part centered margin-bottom-45"> {{__('app.pages.index.Most Recent Listings')}} <span>{{__('app.pages.index.Explore the greates listing in the city')}}</span> </h3>
        </div>
		
		<div class="row">
			<div class="col-md-12">
				<div class="simple_slick_carousel_block utf_dots_nav"> 
					@include('partials.listing.listings-grid-layout', ['listings' => $listings, 'slide' => true])
				</div>
			  </div>
		  </div>
		  <div class="col-md-12 centered_content"> <a href="{{route('listing.index')}}" class="button border margin-top-20">{{__('app.View More')}}</a> </div>
	   </div>
    </div>
  </section>
  
  <a href="{{route('listing.index')}}" class="flip-banner parallax" data-background="images/slider-bg-02.jpg" data-color="#000" data-color-opacity="0.85" data-img-width="2500" data-img-height="1666">
	  <div class="flip-banner-content">
		<h2 class="flip-visible">{{__('app.pages.index.Browse Listings Attractions List')}}</h2>    
	  </div>
  </a>
  
  <section class="utf_testimonial_part fullwidth_block padding-top-75 padding-bottom-75"> 
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h3 class="headline_part centered">{{__('app.pages.index.What Say Our Customers')}} <span class="margin-top-15">{{__('app.pages.index.Customer comment desc')}}</span> </h3>
        </div>
      </div>
    </div>
    <div class="fullwidth_carousel_container_block margin-top-20">
      <div class="utf_testimonial_carousel testimonials"> 
        <div class="utf_carousel_review_part">
          <div class="utf_testimonial_box">
            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</div>
          </div>
          <div class="utf_testimonial_author"> <img src="images/happy-client-01.jpg" alt="">
            <h4>Denwen Evil <span>Web Developer</span></h4>
          </div>
        </div>
        <div class="utf_carousel_review_part">
          <div class="utf_testimonial_box">
            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</div>
          </div>
          <div class="utf_testimonial_author"> <img src="images/happy-client-02.jpg" alt="">
            <h4>Adam Alloriam <span>Web Developer</span></h4>
          </div>
        </div>
        <div class="utf_carousel_review_part">
          <div class="utf_testimonial_box">
            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</div>
          </div>
          <div class="utf_testimonial_author"> <img src="images/happy-client-03.jpg" alt="">
            <h4>Illa Millia <span>Project Manager</span></h4>
          </div>
        </div>
		<div class="utf_carousel_review_part">
          <div class="utf_testimonial_box">
            <div class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</div>
          </div>
          <div class="utf_testimonial_author"> <img src="images/happy-client-01.jpg" alt="">
            <h4>Denwen Evil <span>Web Developer</span></h4>
          </div>
        </div>
      </div>
    </div>
  </section>   
  
  <div class="container padding-bottom-70">
    <div class="row">
      <div class="col-md-12">
        <h3 class="headline_part centered margin-bottom-35 margin-top-70">{{__('app.pages.index.Most Popular Service')}} <span>{{__('app.pages.index.Discover best service for appointment')}}</span></h3>
      </div>
      <div class="col-md-3"> 
         <a href="listings_list_with_sidebar.html" class="img-box" data-background-image="images/popular-location-01.jpg">
			<div class="utf_img_content_box visible">
			  <h4>Nightlife </h4>
			  <span>18 Listings</span> 
			</div>
         </a> 
	  </div>
      <div class="col-md-3"> 
         <a href="listings_list_with_sidebar.html" class="img-box" data-background-image="images/popular-location-02.jpg">
			<div class="utf_img_content_box visible">
			  <h4>Shops</h4>
			  <span>24 Listings</span> 
			</div>
         </a> 
	  </div>
      <div class="col-md-6"> 
         <a href="listings_list_with_sidebar.html" class="img-box" data-background-image="images/popular-location-03.jpg">
			<div class="utf_img_content_box visible">
			  <h4>Restaurant</h4>
			  <span>17 Listings</span> 
			</div>
         </a> 
	  </div>
      <div class="col-md-6"> 
         <a href="listings_list_with_sidebar.html" class="img-box" data-background-image="images/popular-location-04.jpg">
			<div class="utf_img_content_box visible">
			  <h4>Outdoor Activities</h4>
			  <span>12 Listings</span> 
			</div>
         </a> 
	  </div>
      <div class="col-md-3"> 
         <a href="listings_list_with_sidebar.html" class="img-box" data-background-image="images/popular-location-05.jpg">
			<div class="utf_img_content_box visible">
			  <h4>Hotels</h4>
			  <span>14 Listings</span> 
			</div>
         </a> 
	  </div>
      <div class="col-md-3"> 
         <a href="listings_list_with_sidebar.html" class="img-box" data-background-image="images/popular-location-06.jpg">
			<div class="utf_img_content_box visible">
			  <h4>New York</h4>
			  <span>9 Listings</span> 
			</div>
         </a>
	  </div>
    </div>
  </div>


@endsection


@section('scripts')
	<script src="{{ asset('js/layout/ajax-bootstrap-select.min.js') }}"></script>
	<script>
		jQuery(function($){

	

		var options = {
			ajax: {
				url: "/api/city-search",
				type: "POST",
				dataType: "json",
				data: {
				q: "@php echo '{{{q}}}' @endphp"
				}
			},
			locale:{
				searchPlaceholder: "نام شهر یا استان را جستجو کنید",
				statusSearching: "درحال جستجو",
				statusInitialized: "شهر مورد نظر را جستجو کنید",
				statusNoResults: "محلی یافت نشد. دوباره امتحان کنید"
			},
			preprocessData: function(data) {
				var i,
				l = data.length,
				array = [];
				if (l) {
				for (i = 0; i < l; i++) {
					array.push(
					$.extend(true, data[i], {
						text: data[i].province.name + " - " + data[i].name,
						value: data[i].id,
				
					})
					);
				}

				}
				// You must always return a valid array when processing data. The
				// data argument passed is a clone and cannot be modified directly.
				return array;
			}
			};

			$(".selectpicker.city")
			.selectpicker()
			.ajaxSelectPicker(options);


			
		
		})

	</script>

@endsection