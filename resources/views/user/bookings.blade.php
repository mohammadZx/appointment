@extends('layouts.app')
@section('seo_title', get_title(__('app.Bookings')))
@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="row"> 

	<div class="col-lg-12">
          <div class="utf_dashboard_list_box invoices with-icons margin-top-20">
            <h4>{{__('app.Recent bookings')}}</h4>
            <ul class="user-bookings">
              @foreach($bookings as $booking)
              <li>
                <a href="{{route('listing.show', $booking->listing->id)}}"><strong>{{$booking->listing->name}}
                <span class="paid booking-status {{$booking->status->value}}">{{__('app.'.$booking->status->value)}}</span>
                @if($booking->getMeta('late_origin_date', true))
                @php
                  $minuts = explode('|', $booking->getMeta('late_origin_date', true));
                  if(count($minuts) == 2){ $minuts = date_diff_minut($minuts[1], $booking->date_end); }else{ $minuts = null; }
                @endphp

                @if($minuts)
                <span class="paid booking-status none">{{str_replace('{0}', $minuts, __('app.You appointment was late {0} minut by owner'))}}</span>
                @endif

                @endif
              </strong></a>
                <ul>
                  @foreach($booking->subServices as $subservice)
                  <li>{{$subservice->title}}</li>
                  @endforeach
                  <li><span>{{__('app.In date')}} {{$booking->date_start->format('Y-m-d')}} {{__('app.From hour')}} {{$booking->date_start->format('H:i')}} {{__('app.To hour')}} {{$booking->date_end->format('H:i')}}</li>
                </ul>
                <div class="buttons-to-right"> <form action="{{route('user.booking.destroy', $booking->id)}}" method="post">@csrf @method('delete')<button class="button gray"><i class="sl sl-icon-trash"></i> {{__('app.Delete booking')}}</button></form> </div>
                <ul class="margin-top-10"><li><i class="im im-icon-Location-2"></i> {{$booking->listing->address}}</li></ul>
                
                @if($booking->status->value != 'finish')
                  <ul class="margin-top-10 counter-booking" data-start="{{toGregorian($booking->date_start)}}"><li>this is counter</li></ul>
                @endif
                
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
<script src="{{ asset('js/layout/jquery.countdown2.min.js') }}"></script>
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



$('.counter-booking').each(function(){
  var time = $(this).data('start')
  console.log(time)
    $(this).find('li').countdown(time, function(event) {
      $(this).html(
        event.strftime(`
        <span class="item d">
        <span class="t">%D</span>
          <span class="n">{{__('app.Days')}}</span>
        </span>
        <span class="item h">
        <span class="t">%H</span>
          <span class="n">{{__('app.Hours')}}</span>
        </span>
        <span class="item m">
        <span class="t">%M</span>
          <span class="n">{{__('app.Minuts')}}</span>
        </span>
        <span class="item s">
        <span class="t">%S</span>
          <span class="n">{{__('app.Seconds')}}</span>
        </span>
        <span clss="gls">{{__('app.Remaining until your turn')}}</span>
        `)
      );
    });
})
</script>

@endsection