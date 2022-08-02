@extends('layouts.app')
@section('seo_title', 'شرکت ایران')
@section('content')

<div id="titlebar" class="gradient margin-bottom-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{__('app.About Us')}}</h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{route('home')}}">{{__('app.Home')}}</a></li>
              <li>{{__('app.About Us')}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  
  <section class="utf_testimonial_part fullwidth_block padding-top-75 padding-bottom-75"> 
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <h3 class="headline_part centered"> درباره مجموعه
             <span class="margin-top-15">
             اینجاییم تا با بکار گیری علم و تکنولوژی روز دنیا از با ارزش ترین دارایی انسان ینی زمان محافظت کنیم
<br>
رسالت ما به ارمغان اوردن محیط کاری  منظم و ارتباط درست وبه موقع بین صاحبین کسبو کار ها و مشتریانشان است
این سایت با محیطی بسیار ساده در عین حال بصورتی طراحی شده که تمامی افراد توانایی استفاده از ان را داشته باشند 
و با از میان برداشتن صف های انتظار از اتلاف وقت و سرمایه افراد جلوگیری خواهد کرد بصورتی که نیازی به انتظار کشیدن در محل کار نخواهد بود و بصورت لحظه ای در سایت زمان رسیدن نوبت قابل مشاهده است  و همچنین با دور اندیشی و انعطاف پذیری بالا زمینه بهره مندی تمام مشاغل را فراهم کرده ایم
            </span>
            </h3>
        </div>
      </div>
    </div>
  </section>
  
  <div class="parallax" data-background="{{asset('images/poster_6daebe07-1617-405c-abeb-f8e17c992c6e.webp')}}"> 
    <div class="utf_text_content white-font">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <h2>کسب و کار خود را معرفی کنید یا از دیگر کسب و کار ها نوبت بگیرید</h2>
            <p>این مجموعه یک مرجع مدیریت کسب و کار و نوبت ها می باشد. شما می توانید در این سامانه کسب و کار خود را ثبت کنید.  و یانکه از دیگر کسب و کار ها نوبت بگیرید.
              <br>
              با بهینه سازی هایی که صورت گرفته تداخلی در سیستم نوبت دهی و هدر رفت زمان وجود ندارد.
            </p>
            <a href="{{route('home')}}" class="button margin-top-25">شروع کنید</a> </div>
        </div>
      </div>
    </div>   
  </div>
	
  <section class="fullwidth_block padding-bottom-70" data-background-color="#f9f9f9"> 
	  <div class="container">
		<div class="row">
		  <div class="col-md-8 col-md-offset-2">
			<h2 class="headline_part centered margin-top-80">چگونه کار می کنیم <span class="margin-top-10">مشاهده بهترین کسب و کار ها در محل خود</span> </h2>
		  </div>
		</div>
		<div class="row container_icon"> 

    <div class="col-md-4 col-sm-4 col-xs-12">
			<div class="box_icon_two"> <i class="im im-icon-Administrator"></i>
			  <h3>اطلاع رسانی پیامکی</h3>
			  <p>مشخص کنید در چه زمانی قبل از شروع نوبت به شما با sms اطلاع رسانی شود.</p>
			</div>
		  </div>

      <div class="col-md-4 col-sm-4 col-xs-12">
			<div class="box_icon_two box_icon_with_line"> <i class="im im-icon-Mail-Add"></i>
			  <h3>مدیریت نوبت ها و تاخیر ها</h3>
			  <p>مشخص کنید برای هر نوبت چقدر زمان نیاز دارید. در صورت تاخیر مشخص کنید که برای نوبت های دیگر اطلاع رسانی داده شود</p>
			</div>
		  </div>


		  <div class="col-md-4 col-sm-4 col-xs-12">
			<div class="box_icon_two box_icon_with_line"> <i class="im im-icon-Map-Marker2"></i>
			  <h3>ثبت کسب و کار</h3>
			  <p>کسب و کار خود را ثبت کنید. خدمات خود و روز های کاری را تعریف کنید. شبکه های اجتماعی و مشخصات دیگر کسب و کار را تعریف کنید تا برای همگان قابل نمایش باشد.</p>
			</div>
		  </div>
		  
		
		  
		
		</div>
	  </div>
  </section>
  

  


@endsection