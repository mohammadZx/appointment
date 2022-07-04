<a href="#" class="utf_dashboard_nav_responsive"><i class="fa fa-reorder"></i> {{__('app.Dashboard Sidebar Menu')}}</a>
    <div class="utf_dashboard_navigation">
      <div class="utf_dashboard_navigation_inner_block">
        <ul>
          <li class="active"><a href="{{route('user.dashboard')}}"><i class="sl sl-icon-layers"></i> {{__('app.Dashboard')}}</a></li>       
		  <li><a href="{{route('user.listing.index')}}"><i class="sl sl-icon-layers"></i> {{__('app.My Listings')}}</a></li>		  		 
		  <li><a href="{{route('user.booking.index')}}"><i class="sl sl-icon-docs"></i> {{__('app.Bookings')}}</a></li>		                                             		 
		  <li><a href="{{route('user.appointment.index')}}"><i class="sl sl-icon-docs"></i> {{__('app.Appointment')}}</a></li>		                                             		 
		  <li><a href="{{route('user.profile')}}"><i class="sl sl-icon-user"></i> {{__('app.My Profile')}}</a></li>
		  <li><a href="{{route('user.wishlist.index')}}"><i class="sl sl-icon-heart"></i> {{__('app.Wishlists')}}</a></li>
          <li><form action="{{route('logout')}}" method="post" style="padding: 15px;">
			@csrf
			@method('post')
			<button class="button"><i class="sl sl-icon-power"></i> {{__('app.Logout')}}</button>
		  </form></li>

		  <hr>

		  <li><a href="{{route('admin.listing.index')}}"><i class="sl sl-icon-layers"></i>{{__('app.Listings')}}</a></li>		  		 
		  <li><a href="{{route('admin.appointment.index')}}"><i class="sl sl-icon-docs"></i> {{__('app.Bookings')}}</a></li>	
		  <li><a href="{{route('admin.category.index')}}"><i class="fa fa-tag"></i> {{__('app.Category')}}</a></li>	
		  <li><a href="{{route('admin.province.index')}}"><i class="fa fa-map"></i> {{__('app.Provinces')}}</a></li>	
		  <li><a href="{{route('admin.city.index')}}"><i class="fa fa-map"></i> {{__('app.Cities')}}</a></li>	
		  <li><a href="{{route('admin.service.index')}}"><i class="fa fa-wrench"></i> {{__('app.Service')}}</a></li>	
		  <li><a href="{{route('admin.sub-service.index')}}"><i class="fa fa-wrench"></i> {{__('app.Sub Service')}}</a></li>	
		  <li><a href="{{route('admin.user.index')}}"><i class="sl sl-icon-user"></i> {{__('app.Users')}}</a></li>	
		  <li><a href="{{route('admin.comment.index')}}"><i class="fa fa-comment"></i> {{__('app.Comments')}}</a></li>	

		</ul>
      </div>
    </div> 