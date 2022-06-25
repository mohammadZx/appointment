<header id="header_part"> 
    <div id="header">
      <div class="container"> 
        <div class="utf_left_side"> 
          <div id="logo"> <a href="{{route('home')}}"><img src="images/logo.png" alt=""></a> </div>
          <div class="mmenu-trigger">
			<button class="hamburger utfbutton_collapse" type="button">
				<span class="utf_inner_button_box">
					<span class="utf_inner_section"></span>
				</span>
			</button>
		  </div>
          <nav id="navigation" class="style_one">
            <ul id="responsive">
              <li><a class="current" href="{{route('home')}}">{{__('app.Home')}}</a></li>			  
              <li><a href="{{route('listing.index')}}">{{__('app.Listings')}}</a>
                <ul>
                  <li><a href="#">List Layout</a></li>                  
                  <li><a href="#">List Layout</a></li>                  
                  <li><a href="#">List Layout</a></li>                  
                  <li><a href="#">List Layout</a></li>                  
                  <li><a href="#">List Layout</a></li>                  
                  <li><a href="#">List Layout</a></li>                  
                  <li><a href="#">List Layout</a></li>                  
                </ul>
              </li>
              <li><a href="#">{{__('app.Blog')}}</a></li>
              <li><a href="{{route('about')}}">{{__('app.About us')}}</a></li>              
              <li><a href="{{route('contact')}}">{{__('app.Contact us')}}</a></li>              
              <li><a href="{{route('faq')}}">{{__('app.FAQ')}}</a></li>              
            </ul>
          </nav>
          <div class="clearfix"></div>
        </div>
        <div class="utf_right_side">
          <div class="header_widget"> 
            @guest
              <a href="#dialog_signin_part" class="button border sign-in popup-with-zoom-anim"><i class="fa fa-sign-in"></i>{{__('app.Login/Register')}}</a>
              <a href="#dialog_signin_part" class="button border with-icon popup-with-zoom-anim"><i class="sl sl-icon-user"></i> {{__('app.Add listing')}}</a></div>
              @else
              <a class="nav-link" href="{{route('user.dashboard')}}">{{ Auth::user()->name }}</a>
              <a href="{{route('listing.create')}}" class="button border with-icon"><i class="sl sl-icon-user"></i> {{__('app.Add listing')}}</a></div>
            @endguest
            
        </div>
        
        <div id="dialog_signin_part" class="zoom-anim-dialog mfp-hide">
          <div class="small_dialog_header">
            <h3>{{__('app.Login/Register')}}</h3>
          </div>
          <div class="utf_signin_form style_one">
            <div class="tab_container alt"> 
                <form method="post" class="login">
                  <p class="utf_row_form utf_form_wide_block">
                    <label for="password">
                      <input class="input-text" type="password" name="password" id="password" placeholder="Password"/>
                    </label>
                  </p>
                  <div class="utf_row_form">
                    <input type="submit" class="button border margin-top-5" name="login" value="Login" />
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    </div>    
  </header>