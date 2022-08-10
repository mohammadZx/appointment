@extends('layouts.app')
@section('seo_title', get_title(__('app.Account')))
@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
    <div class="utf_dashboard_content">

      <div class="row"> 
        <div class="col-lg-3 col-md-6">
          <div class="utf_dashboard_stat color-1">
            <div class="utf_dashboard_stat_content">
              <h4>{{$user->listings->count()}}</h4>
              <span>{{__('app.Published Listings count')}}</span>
			</div>
            <div class="utf_dashboard_stat_icon"><i class="im im-icon-Map2"></i></div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="utf_dashboard_stat color-2">
            <div class="utf_dashboard_stat_content">
              <h4>{{$user->appointments->count()}}</h4>
              <span>{{__('app.Your appointments listings count')}}</span>
			</div>
            <div class="utf_dashboard_stat_icon"><i class="im im-icon-Add-UserStar"></i></div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="utf_dashboard_stat color-3">
            <div class="utf_dashboard_stat_content">
              <h4>{{$user->bookings->count()}}</h4>
              <span>{{__('app.Your bookings count')}}</span>
			</div>
            <div class="utf_dashboard_stat_icon"><i class="im im-icon-Align-JustifyRight"></i></div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-6">
          <div class="utf_dashboard_stat color-4">
            <div class="utf_dashboard_stat_content">
              <h4>{{$user->wishlists->count()}}</h4>
              <span>{{__('app.Your wishlists count')}}</span>
			</div>
            <div class="utf_dashboard_stat_icon"><i class="im im-icon-Heart"></i></div>
          </div>
        </div>
	
      </div>
      
      <div class="row"> 
      @if($user->listings->count() > 0)
        <div class="col-lg-6 col-md-12">
          <div class="utf_dashboard_list_box with-icons margin-top-20">
            <h4>{{__('app.Your listings list')}}</h4>
            <ul>
              @foreach($listings as $listing)
              <li> 
                <a href="{{route('user.listing.edit', $listing->id)}}">{{$listing->name}}</a> <strong><a href="#">{{$listing->service->title}}</a></strong></a> 
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif
		<div class="@if($user->listings->count() == 0) col-lg-12 @else col-lg-6 @endif col-md-12">
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

        @if($user->appointments->count() > 0)
        <div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box invoices with-icons margin-top-20">
            <h4>{{__('app.Recent bookings for your listing')}}</h4>
            <ul>
              @foreach($appointments as $appointment)
              <li><a href="{{route('listing.show', $appointment->listing->id)}}"><strong>{{$appointment->listing->name}} <span class="paid booking-status {{$appointment->status->value}}">{{__('app.'.$appointment->status->value)}}</span></strong></a>
              <form class="changestatus-appointment" action="{{route('user.appointment.changestatus', $appointment->id)}}" method="post">
                @csrf    
              <select required name="status">
                        <option value="">{{__('app.Change status to')}}</option>
                        @foreach($cases as $case)
                        <option value="{{$case->value}}">{{__('app.'. $case->value)}}</option>
                        @endforeach
                  </select>
                  <button class="button margin-right-10">انجام</button>
                  <a href="{{route('user.appointment.edit', $appointment->id)}}" class="button button margin-right-10"><span class="im im-icon-Pen-4"></span></a>
              </form> 

              <ul>
                  @foreach($appointment->subServices as $subservice)
                  <li>{{$subservice->title}}</li>
                  @endforeach
                  <li>@if($appointment->name && $appointment->phone) {{$appointment->name}} - {{$appointment->phone}} @else {{$appointment->user->name}} - {{$appointment->user->phone}} @endif</li>
                  <li><span>{{__('app.In date')}} {{$appointment->date_start->format('Y-m-d')}} {{__('app.From hour')}} {{$appointment->date_start->format('H:i')}} {{__('app.To hour')}} {{$appointment->date_end->format('H:i')}}</li>
                </ul>
                <div class="buttons-to-right"> <form action="{{route('user.appointment.destroy', $appointment->id)}}" method="post">@csrf @method('delete')<button class="button gray"><i class="sl sl-icon-trash"></i> {{__('app.Delete booking')}}</button></form> </div>              </li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif

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