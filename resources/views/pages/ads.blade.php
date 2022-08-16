@extends('layouts.app')
@section('seo_title', get_title('پرسش و پاسخ'))
@section('content')

<div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{__('app.Ads')}}</h2>
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{route('home')}}">{{__('app.Home')}}</a></li>
              <li>{{__('app.Ads')}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  
  <section class="fullwidth_block margin-top-0 padding-top-0 padding-bottom-75" data-background-color="#fff"> 
	 <div class="container"> 
		<div class="row justify-center">
			<div class="col-md-8">			  
			  <div class="style-2">
				
			  </div>
			</div>
		 </div>	
	  </div>
  </div>


@endsection