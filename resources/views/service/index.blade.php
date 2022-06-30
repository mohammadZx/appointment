@extends('layouts.app')
@section('seo_title', 'همه خدمات')
@section('content')

<div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{__('app.Listings')}}</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{route('home')}}">{{__('app.Home')}}</a></li>
              <li>{{__('app.Services')}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="container_categories_box margin-top-5 margin-bottom-30"> 
          	@foreach($services as $service)
				<a href="{{route('service.show', $service->id)}}" class="utf_category_small_box_part"> <i class="{{$service->icon}}"></i>
					<h4>{{$service->title}}</h4>
					<span>{{$service->listings()->count()}}</span>
				</a> 
			@endforeach
		</div>
  </div>
 

@endsection