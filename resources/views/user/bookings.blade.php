@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="row"> 
        <div class="col-lg-6 col-md-6">
          <div class="utf_dashboard_list_box margin-top-0">
			<div class="sort-by my_sort_by">
                <div class="utf_sort_by_select_item">
                  <select data-placeholder="All Listing" class="utf_chosen_select_single">
                    <option>All Listing</option>
				    <option>Burger House</option>
				    <option>Sandfields Silver</option>
                    <option>Beer Bar & Restaurant</option>
					<option>Vintage Italian</option>
					<option>Modern Apartment</option>
                  </select>
                </div>
            </div>
			<h4>Bookings Request</h4>
			<ul>			  
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Vintage Italian Beer Bar & Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 199</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>The Hot and More Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 249</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Vintage Italian Beer Bar & Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 399</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_canceled_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Canceled</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Burger House (MG Road)</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 299</li>
						</ul>
					  </div>					  
					</div>
				  </div>
				</div>
			  </li>
			  <li class="utf_pending_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status pending">Pending</span><span class="utf_booking_listing_status unpaid">Unpaid</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Sandfields Silver - (Apartment & Villa)</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 299</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Reject</a> <a href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Approve</a> </div>
			  </li>
			</ul>
          </div>		  
        </div>
		<div class="col-lg-6 col-md-6">
          <div class="utf_dashboard_list_box margin-top-0">
			<div class="sort-by my_sort_by">
                <div class="utf_sort_by_select_item">
                  <select data-placeholder="All Listing" class="utf_chosen_select_single">
                    <option>All Listing</option>
				    <option>Burger House</option>
				    <option>Beer Bar & Restaurant</option>
					<option>Vintage Italian</option>					
                  </select>
                </div>
            </div>
			<h4>Recent Bookings</h4>
			<ul>			  
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>The Hot and More Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 249</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_approved_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Approved</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Vintage Italian Beer Bar & Restaurant</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 399</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Cancel</a> </div>
			  </li>
			  <li class="utf_canceled_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status">Canceled</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Burger House (MG Road)</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 299</li>
						</ul>
					  </div>					  
					</div>
				  </div>
				</div>
			  </li>
			  <li class="utf_pending_booking_listing">
				<div class="utf_list_box_listing_item bookings">
				  <div class="utf_list_box_listing_item-img"><img src="images/client-avatar1.jpg" alt=""></div>
				  <div class="utf_list_box_listing_item_content">
					<div class="inner">
					  <h3>Francis Burton <span class="utf_booking_listing_status pending">Pending</span><span class="utf_booking_listing_status unpaid">Unpaid</span></h3>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Item:-</h5>
						<ul class="utf_booking_listing_list">
						  <li>Sandfields Silver - (Apartment & Villa)</li>						  						  
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Start Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">18 November 2019 at 12:00 am</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>End Date:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">19 November 2019 at 12:00 pm</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Booking Details:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">2 Adults, 2 Children</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Email Address:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">info@example.com</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Phone Number:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">+(012) 1123-254-456</li>
						</ul>
					  </div>
					  <div class="utf_inner_booking_listing_list">
						<h5>Price:-</h5>
						<ul class="utf_booking_listing_list">
						  <li class="highlighted">$ 299</li>
						</ul>
					  </div>					  					  
					</div>
				  </div>
				</div>
				<div class="buttons-to-right"> <a href="#" class="button gray reject"><i class="sl sl-icon-close"></i> Reject</a> <a href="#" class="button gray approve"><i class="sl sl-icon-check"></i> Approve</a> </div>
			  </li>
			</ul>
          </div>		  
        </div>
        <div class="col-md-12">
          <div class="footer_copyright_part">{{__('app.Copyright')}}</div>
        </div>
      </div>
	</div>
	  
 
    </div>
  

@endsection


@section('scripts')

<script>
(function($) {
try {
	var jscr1 = $('.js-scrollbar');
	if (jscr1[0]) {
		const ps1 = new PerfectScrollbar('.js-scrollbar');

	}
    } catch (error) {
        console.log(error);
    }
})(jQuery);
</script>

@endsection