@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
   
    <div class="utf_dashboard_content"> 
 
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box margin-top-0">
            @include('partials.listing.admin-listings-list-layout', ['listings' => $listings, 'as_manager' => true]) 
          </div>
        </div>
        <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $listings])
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