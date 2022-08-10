@extends('layouts.app')
@section('seo_title', get_title($service->getMeta('seo_title', true) ? $service->getMeta('seo_title', true) : $service->title))

@section('content')


<div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{__('app.Listings')}}</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{route('home')}}">{{__('app.Home')}}</a></li>
              <li><a href="{{route('service.index')}}">{{__('app.Services')}}</a></li>
              <li>{{$service->title}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      @include('partials.listing.listings', ['listings' => $listings, 'withFilters' => true])
    </div>

	@if($listings->currentPage() == 1)
	<div class="row">
		<div class="archive-content">
			<h1>{{$service->title}}</h1>
			{!! $service->content !!}
		</div>
	</div>
  </div>
  @endif
  

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