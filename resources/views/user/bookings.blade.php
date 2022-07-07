@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="row"> 

	<div class="col-lg-12">
          <div class="utf_dashboard_list_box invoices with-icons margin-top-20">
            <h4>{{__('app.Recent bookings')}}</h4>
            <ul>
              @foreach($bookings as $booking)
              <li><a href="{{route('listing.show', $booking->listing->id)}}"><strong>{{$booking->listing->name}} <span class="paid booking-status {{$booking->status->value}}">{{__('app.'.$booking->status->value)}}</span></strong></a>
                <ul>
                  @foreach($booking->subServices as $subservice)
                  <li>{{$subservice->title}}</li>
                  @endforeach
                  <li><span>{{__('app.In date')}} {{$booking->date_start->format('Y-m-d')}} {{__('app.From hour')}} {{$booking->date_start->format('H:i')}} {{__('app.To hour')}} {{$booking->date_end->format('H:i')}}</li>
                </ul>
                <div class="buttons-to-right"> <form action="{{route('user.booking.destroy', $booking->id)}}" method="post">@csrf @method('delete')<button class="button gray"><i class="sl sl-icon-trash"></i> {{__('app.Delete booking')}}</button></form> </div>
                <ul class="margin-top-10"><li><i class="im im-icon-Location-2"></i> {{$booking->listing->address}}</li></ul>
              </li>
              @endforeach
            </ul>
          </div>
        </div>

		<div class="col-md-12">
		@include('partials.global.paginate', ['items' => $bookings])
		</div>

        <div class="col-md-12">
          <div class="footer_copyright_part">{{__('app.Copyright')}}</div>
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