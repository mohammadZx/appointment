@extends('layouts.app')
@section('seo_title', get_title('تماس با ما'))
@section('content')

<!-- Content --> 

  
  <div class="container margin-top-20 ">
    <div class="row"> 
      <div class="col-md-8">
        <section id="contact" class="margin-bottom-70">
          <h4><i class="sl sl-icon-phone"></i> تماس با ما</h4>          
          <form action="{{route('contactpost')}}" method="post" id="contactform">
            @csrf
            <div class="row">
              <div class="col-md-6">  
				  <input name="name" type="text" class="@error('name') invalid @enderror" placeholder="نام" value="{{old('name')}}" required />   
          @error('name') 
            <span class="invalid-messsage">{{$message}}</span>
          @enderror             
              </div>
              <div class="col-md-6">                
                  <input name="phone" type="text" class="@error('phone') invalid @enderror" placeholder="تلفن" value="{{old('phone')}}" required />
                  @error('phone') 
                    <span class="invalid-messsage">{{$message}}</span>
                  @enderror                 
              </div>
			  <div class="col-md-12 margin-top-10">
				  <textarea name="message" cols="40" rows="2" id="comments" class="@error('message') invalid @enderror" placeholder="پیام شما" required>{{old('phone')}}</textarea>
          @error('message') 
          <span class="invalid-messsage">{{$message}}</span>
        @enderror  
        </div>
            </div>            
            <input type="submit" class="submit button" id="submit" value="ارسال" />
          </form>
        </section>
      </div>
      
      <div class="col-md-4">
		<div class="utf_box_widget margin-bottom-70">
			<h3><i class="sl sl-icon-map"></i> ارتباط با ما</h3>
      <span>شما می توانید از طریق راه های ارتباطی زیر با ما ارتباط بر قرار کنید</span>
			<div class="utf_sidebar_textbox">
			  <ul class="utf_contact_detail">
				<li><strong>تلفن:</strong> <span>09220602545</span></li>
				<li><strong>سایت:</strong> <span><a href="#">{{url('/')}}</a></span></li>
				<li><strong>ایمیل:</strong> <span><a href="mailto:info@example.com">info@example.com</a></span></li>			  </ul>
			</div>	
		</div>
      </div>
    </div>
  </div>
  

@endsection