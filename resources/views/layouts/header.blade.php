<header id="header_part"> 
    <div id="header">
      <div class="container"> 
        <div class="utf_left_side"> 
          <div id="logo"> <a href="{{route('home')}}"><img src="{{LOGO}}" alt=""></a> </div>
          <div class="mmenu-trigger">
			<button class="hamburger utfbutton_collapse" type="button">
				<span class="utf_inner_button_box">
					<span class="utf_inner_section"></span>
				</span>
			</button> 
          </div>
      @auth
      <div class="mmenu-trigger account">
      <a href="{{route('user.dashboard')}}" class="hamburger utfbutton_collapse">
					<i class="sl sl-icon-user"></i>
      </a>
    </div>
      @endauth
          <nav id="navigation" class="style_one">
            <ul id="responsive">
              <li><a class="current" href="{{route('home')}}">{{__('app.Home')}}</a></li>			  
              <li><a href="{{route('listing.index')}}">{{__('app.Listings')}}</a>
                <ul>
                  @foreach($categories as $cat)
                  <li><a href="{{route('category.show', $cat->id)}}">{{$cat->title}}</a></li>    
                  @endforeach                                
                </ul>
              </li>
              <li><a href="{{route('about')}}">{{__('app.About us')}}</a></li>              
              <li><a href="{{route('contact')}}">{{__('app.Contact us')}}</a></li>              
              <li><a href="{{route('faq')}}">{{__('app.FAQ')}}</a></li>              
              <li><a href="{{route('ads')}}">{{__('app.Ads')}}</a></li>              
            </ul>
          </nav>
          <div class="clearfix"></div>
        </div>
        <div class="utf_right_side">
          <div class="header_widget"> 
            @guest
              <a href="#dialog_signin_part" data-redirect="{{route('user.dashboard')}}" class="button border sign-in login-button @if(Route::currentRouteName() != 'login') popup-with-zoom-anim @endif"><i class="fa fa-sign-in"></i>{{__('app.Login/Register')}}</a>
              <a href="#dialog_signin_part" data-redirect="{{route('user.listing.create')}}" class="button border with-icon login-button add-listing-button @if(Route::currentRouteName() != 'login') popup-with-zoom-anim @endif"><i class="sl sl-icon-user"></i> {{__('app.Add listing')}}</a></div>
            @else
              <a href="{{route('user.dashboard')}}" class="header-account-button button border with-icon"><i class="sl sl-icon-user"></i> {{__('app.Account')}}</a>
            @endguest
            
        </div>
        
        @if(Route::currentRouteName() != 'login')
        <div id="dialog_signin_part" class="zoom-anim-dialog mfp-hide">
          <div class="small_dialog_header">
            <h3>&nbsp;</h3>
          </div>
          <div class="utf_signin_form style_one">
            <div class="tab_container alt"> 
                @include('auth.forceauth.loginform')
            </div>
          </div>
        </div>
        @endif



        @auth
      <div id="dialog_search_part" class="zoom-anim-dialog mfp-hide">
          <div class="small_dialog_header">
            <h3>&nbsp;</h3>
          </div>
          <div class="utf_signin_form style_one">
            <div class="tab_container alt"> 
              @include('partials.global.filter', ['filters' => ['city', 'service'] , 'route' => route('listing.index')])
             

         
            <div class="listing-filter">
                <div class="listing_filter_block">
                <form action="{{route('listing.index')}}" class="col-md-12 filter-row">
              
                    <div class="sort-by w-30 px-1">
                        <div class="utf_sort_by_select_item sort_by_margin">
                            <input type="text" name="name" placeholder="{{__('app.Enter listing name')}}" value="">
                        </div>
                    </div>
                
                    <div class="sort-by px-1">
                        <div class="col-md-12 centered_content"> <button class="button border">{{__('app.Apply')}}</button> </div>
                    </div>
                </form>
              
                </div>
            </div>

      
            </div>
          </div>
        </div>
        @endauth

      </div>
    </div>    
  </header>