<!-- Footer -->
<div id="footer" class="footer_sticky_part"> 
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6">
          <h4>{{__('app.Footer Column three')}}</h4>
          <div class="icons d-flex">
            @foreach(SOCIAL as $social)
            <a href="{{$social['link']}}"><i class="{{$social['icon']}}"></i> {{$social['name']}} </a>
            @endforeach
          </div>
          <a href="{{route('home')}}"><img src="{{LOGO}}" alt="" class="logo"></a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <h4>{{__('app.Footer Column two')}}</h4>
          <ul class="social_footer_link">
            <li><a href="#dialog_signin_part" class="popup-with-zoom-anim">{{__('app.Login/Register')}}</a></li>
            <li><a href="{{route('user.dashboard')}}">{{__('app.Account')}}</a></li>
            <li><a href="{{route('user.appointment.index')}}">{{__('app.Appointments')}}</a></li>
            <li><a href="{{route('user.profile')}}">{{__('app.Edit profile')}}</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <h4>{{__('app.Footer Column one')}}</h4>
          <ul class="social_footer_link">
            <li><a href="{{route('home')}}">{{__('app.Home')}}</a></li>
            <li><a href="{{route('about')}}">{{__('app.About us')}}</a></li>
            <li><a href="{{route('contact')}}">{{__('app.Contact us')}}</a></li>
            <li><a href="{{route('service.index')}}">{{__('app.Services')}}</a></li>
          </ul>
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12"> 
          <h4>{{__('app.About Us')}}</h4>
          <p>{{__('app.Footer About Us description')}}</p>          
        </div>
      </div>
      
      <div class="row">
        <div class="col-md-12">
          <div class="footer_copyright_part">{{__('app.Copyright')}}</div>
        </div>
      </div>
    </div>
  </div>  
  <div id="bottom_backto_top"><a href="#"></a></div>
  <a href="#dialog_signin_part" id="bookmark-popup" data-close="true" data-callback="add_to_bookmark"  data-redirect="false" class="d-none button border with-icon login-button popup-with-zoom-anim"></a></div>
