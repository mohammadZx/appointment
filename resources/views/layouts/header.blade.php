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
              @auth
                <li><a href="{{route('user.dashboard')}}">{{__('app.Account')}}</a>
                  <ul>
                  <li class="active"><a href="{{route('user.dashboard')}}"><i class="sl sl-icon-layers"></i> {{__('app.Dashboard')}}</a></li>       
                  <li><a href="#dialog_search_part" class="popup-with-zoom-anim"><i class="sl sl-icon-magnifier"></i> {{__('app.Search')}}</a></li> 
                  <li><a href="{{route('user.listing.index')}}"><i class="sl sl-icon-layers"></i> {{__('app.My Listings')}}</a></li>		  		 
                  <li><a href="{{route('user.listing.create')}}"><i class="sl sl-icon-layers"></i> {{__('app.Add listing')}}</a></li>		  		 
                  <li><a href="{{route('user.booking.index')}}"><i class="sl sl-icon-docs"></i> {{__('app.Bookings')}}</a></li>		                                             		 
                  @if(auth()->user()->listings->count() > 0)
                  <li><a href="{{route('user.appointment.index')}}"><i class="sl sl-icon-docs"></i> {{__('app.Appointment')}}</a></li>		                                             		 
                  @endif
                  <li><a href="{{route('user.profile')}}"><i class="sl sl-icon-user"></i> {{__('app.My Profile')}}</a></li>
                  @can('see_listing')
                  <li><a href="{{route('admin.listing.index')}}"><i class="sl sl-icon-layers"></i>{{__('app.Listings')}}</a></li>		  		 
                  @endcan

                  @can('see_appointment')
                  <li><a href="{{route('admin.appointment.index')}}"><i class="sl sl-icon-docs"></i> {{__('app.Bookings')}}</a></li>	
                  @endcan

                  @can('see_category')
                  <li><a href="{{route('admin.category.index')}}"><i class="fa fa-tag"></i> {{__('app.Category')}}</a></li>	
                  @endcan

                  @can('see_province')
                  <li><a href="{{route('admin.province.index')}}"><i class="fa fa-map"></i> {{__('app.Provinces')}}</a></li>	
                  @endcan

                  @can('see_service')
                  <li><a href="{{route('admin.service.index')}}"><i class="fa fa-wrench"></i> {{__('app.Service')}}</a></li>	
                  @endcan

                  @can('see_subservice')
                  <li><a href="{{route('admin.subservice.index')}}"><i class="fa fa-wrench"></i> {{__('app.Sub Service')}}</a></li>	
                  @endcan

                  @can('see_user')
                  <li><a href="{{route('admin.user.index')}}"><i class="sl sl-icon-user"></i> {{__('app.Users')}}</a></li>	
                  @endcan

                  @can('see_comment')
                  <li><a href="{{route('admin.comment.index')}}"><i class="fa fa-comment"></i> {{__('app.Comments')}}</a></li>	
                @endcan

                <li><a href="{{route('user.wishlist.index')}}"><i class="sl sl-icon-heart"></i> {{__('app.Wishlists')}}</a></li>
                      <li><form action="{{route('logout')}}" method="post" style="padding: 15px;">
                  @csrf
                  @method('post')
                  <button style="background:none;border:none;padding:0"><i class="sl sl-icon-power"></i> {{__('app.Logout')}}</button>
                  </form></li>
                  </ul>
                </li>
              @endauth
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
    
    @if(auth()->check() && !request()->is('user*') && !request()->is('admin*'))
    <div class="user-navigate-index">
       @include('partials.user.dashboard')
    </div>
    @endif

    @if(auth()->check() && in_array(\Request::route()->getName(), [
      'user.listing.create',
      'user.listing.edit',
      'admin.listing.edit',
      ]))
      <div class="user-navigate-index">
        @include('partials.user.dashboard')
      </div>
    @endif

  </header>


 