@extends('layouts.app')
@section('seo_title', get_title(__('app.Appointment')))
@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
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
              @if($appointment->status->value != 'finish')
              <form class="finish-appintment" action="{{route('user.appointment.finish', $appointment->id)}}" method="POST">
                @csrf
                <div class="row margint-top-10 margin-bottom-10">
                  <div class="col-md-7">
                    <input value="true" id="late-{{$appointment->id}}" name="inform_other" type="checkbox">
                    <label for="late-{{$appointment->id}}">{{__('app.If you want to inform other appointments check it')}}</label>
                  </div>
                  <div class="col-md-3 padding-0"><input type="number" name="much" placeholder="{{__('app.How many appointment get to defer?')}}"></div>
                  <div class="col-md-2"><button class="button btn-success">{{__('app.Finish appointment')}}</button></div>
                </div>
              </form>
              @endif
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

		  <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $appointments])
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