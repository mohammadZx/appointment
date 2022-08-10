@extends('layouts.app')
@section('seo_title', get_title('تماس با ما'))
@section('content')

<!-- Content --> 

  
  <div class="container margin-top-20 ">
    <div class="row"> 
      <div class="col-md-8">
        <section id="contact" class="margin-bottom-70">
          <h4><i class="sl sl-icon-phone"></i> تماس با ما</h4>          
          <form id="contactform">
            <div class="row">
              <div class="col-md-6">  
				  <input name="name" type="text" placeholder="نام" required />                
              </div>
              <div class="col-md-6">                
                  <input name="email" type="text" placeholder="تلفن" required />                
              </div>
			  <div class="col-md-12">
				  <textarea name="comments" cols="40" rows="2" id="comments" placeholder="پیام شما" required></textarea>
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