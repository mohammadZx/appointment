@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
    <div class="utf_dashboard_content">

      <div class="row"> 
        <div class="col-lg-3 col-md-6">
          <div class="utf_dashboard_stat color-1">
            <div class="utf_dashboard_stat_content">
              <h4>36</h4>
              <span>Published Listings</span>
			</div>
            <div class="utf_dashboard_stat_icon"><i class="im im-icon-Map2"></i></div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="utf_dashboard_stat color-2">
            <div class="utf_dashboard_stat_content">
              <h4>615</h4>
              <span>Pending Listings</span>
			</div>
            <div class="utf_dashboard_stat_icon"><i class="im im-icon-Add-UserStar"></i></div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="utf_dashboard_stat color-3">
            <div class="utf_dashboard_stat_content">
              <h4>9128</h4>
              <span>Expired Listings</span>
			</div>
            <div class="utf_dashboard_stat_icon"><i class="im im-icon-Align-JustifyRight"></i></div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="utf_dashboard_stat color-4">
            <div class="utf_dashboard_stat_content">
              <h4>572</h4>
              <span>New Feedbacks</span>
			</div>
            <div class="utf_dashboard_stat_icon"><i class="im im-icon-Diploma"></i></div>
          </div>
        </div>
	
      </div>
      <div class="row"> 
        <div class="col-lg-6 col-md-12">
          <div class="utf_dashboard_list_box with-icons margin-top-20">
            <h4>Recent Activities</h4>
            <ul>
              <li> 
				<i class="utf_list_box_icon sl sl-icon-layers"></i> Peter Parker Left A Review 5.0 On <strong><a href="#"> Restaurant</a></strong> <a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>
              <li> 
			    <i class="utf_list_box_icon sl sl-icon-star"></i> Your Listing <strong><a href="#">Local Service</a></strong> Has Been Approved<a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>
              <li> 
				<i class="utf_list_box_icon sl sl-icon-heart"></i> Someone Bookmarked Your <strong><a href="#">Listing</a></strong> Restaurant <a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>              
              <li> 
			    <i class="utf_list_box_icon sl sl-icon-star"></i> Your Listing <strong><a href="#">Local Service</a></strong> Has Been Approved<a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>
              <li> 
			    <i class="utf_list_box_icon sl sl-icon-heart"></i> Someone Bookmarked Your <strong><a href="#">Listing</a></strong> Restaurant <a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>			  
              <li> 
				<i class="utf_list_box_icon sl sl-icon-layers"></i> Peter Parker Left A Review 5.0 On <strong><a href="#"> Restaurant</a></strong> <a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>
			  <li>
			    <i class="utf_list_box_icon sl sl-icon-star"></i> Someone Bookmarked Your <strong><a href="#">Listing</a></strong> Restaurant <a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>
			  <li> 
				<i class="utf_list_box_icon sl sl-icon-layers"></i> Peter Parker Left A Review 5.0 On <strong><a href="#"> Restaurant</a></strong> <a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>
              <li> 
			    <i class="utf_list_box_icon sl sl-icon-star"></i> Your Listing <strong><a href="#">Local Service</a></strong> Has Been Approved<a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>
              <li> 
				<i class="utf_list_box_icon sl sl-icon-heart"></i> Someone Bookmarked Your <strong><a href="#">Listing</a></strong> Restaurant <a href="#" class="close-list-item"><i class="fa fa-close"></i></a> 
			  </li>
            </ul>
          </div>
        </div>
		<div class="col-lg-6 col-md-12">
          <div class="utf_dashboard_list_box invoices with-icons margin-top-20">
            <h4>All Order Invoices</h4>
            <ul>
              <li><i class="utf_list_box_icon sl sl-icon-doc"></i> <strong><span class="paid">Paid</span> Premium Plan</strong>
                <ul>
                  <li><span>Order Number:-</span> 004128641</li>
                  <li><span>Date:-</span> 12 Jan 2019</li>
                </ul>
                <div class="buttons-to-right"> <a href="dashboard_invoice.html" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
              </li>
              <li><i class="utf_list_box_icon sl sl-icon-doc"></i> <strong><span class="paid">Paid</span> Platinum Plan</strong>
                <ul>
                  <li><span>Order Number:-</span> 004312641</li>
                  <li><span>Date:-</span> 12 Jan 2019</li>
                </ul>
                <div class="buttons-to-right"> <a href="dashboard_invoice.html" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
              </li>
              <li><i class="utf_list_box_icon sl sl-icon-doc"></i> <strong><span class="paid">Paid</span> Platinum Plan</strong>
                <ul>
                  <li><span>Order Number:-</span> 004312641</li>
                  <li><span>Date:-</span> 12 Jan 2019</li>
                </ul>
                <div class="buttons-to-right"> <a href="dashboard_invoice.html" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
              </li>
              <li><i class="utf_list_box_icon sl sl-icon-doc"></i> <strong><span class="unpaid">Unpaid</span> Basic Plan</strong>
                <ul>
                  <li><span>Order Number:-</span> 004031281</li>
                  <li><span>Date:-</span> 12 Jan 2019</li>
                </ul>
                <div class="buttons-to-right"> <a href="dashboard_invoice.html" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
              </li>
			  <li><i class="utf_list_box_icon sl sl-icon-doc"></i> <strong><span class="unpaid">Unpaid</span> Basic Plan</strong>
                <ul>
                  <li><span>Order Number:-</span> 004031281</li>
                  <li><span>Date:-</span> 12 Jan 2019</li>
                </ul>
                <div class="buttons-to-right"> <a href="dashboard_invoice.html" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
              </li>
			  <li><i class="utf_list_box_icon sl sl-icon-doc"></i> <strong><span class="unpaid">Unpaid</span> Basic Plan</strong>
                <ul>
                  <li><span>Order Number:-</span> 004031281</li>
                  <li><span>Date:-</span> 12 Jan 2019</li>
                </ul>
                <div class="buttons-to-right"> <a href="dashboard_invoice.html" class="button gray"><i class="sl sl-icon-printer"></i> Invoice</a> </div>
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