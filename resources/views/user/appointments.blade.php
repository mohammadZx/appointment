@extends('layouts.app')
@section('seo_title', get_title(__('app.Appointment')))
@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">

  <div class="col-lg-12 col-md-12">
    <div class="table-responsive">
      <table class="table text-right appointmentstable">
        <tr>
          <th>تاریخ</th>
          <th>خدمت</th>
          <th>تعداد</th>
        </tr>
        @foreach($dateBooks as $book)
        <tr>
          <td>{{explode(' ', toJalali($book->date))[0]}}</td>
          <td>{{$book->title}}</td>
          <td>{{$book->count}}</td>
        </tr>
        @endforeach
      </table>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 apt-filter">
  @include('partials.global.filter', ['filters' => ['aptdate', 'aptstatus'] , 'route' => route('user.appointment.index')])
  </div>
  <div class="col-lg-12 col-md-12 apt-setgap">
    <form action="{{route('user.appointment.gap')}}" class="" method="post">
      @csrf
      <div class="filter-row">
        <div class="sort-by w-30">
          <input type="text" name="minutes" placeholder="{{__('app.Gap in minute')}}">
        </div>
        <div class="sort-by w-30 px-1">
          <button class="button">{{__('app.Add time gap')}}</button>
        </div>
      </div>
    </form>
  </div>
	<div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box invoices with-icons">
            <h4>{{__('app.Recent bookings for your listing')}}</h4>
            <ul class="user-appointments">
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
              @if($appointment->status->value != 'finish' && strtotime(toGregorian($appointment->date_start)) < time())
              <form class="finish-appintment" action="{{route('user.appointment.finish', $appointment->id)}}" method="POST">
                @csrf
                <div class="row margint-top-10 margin-bottom-10">
                  <div class="col-md-10 d-none">
                    <input class="d-none" value="true" id="late-{{$appointment->id}}" name="inform_other" type="checkbox">
                    <label class="d-none" for="late-{{$appointment->id}}">{{__('app.If you want to inform other appointments check it')}}</label>
                    <br>
                    <input class="d-none" value="true" checked id="send-{{$appointment->id}}" name="send_time_sms" type="checkbox">
                    <label class="d-none" for="send-{{$appointment->id}}">{{__('app.If you want to notify next appointment check it')}}</label>
                  </div>
                  <div class="col-md-6"></div>
                  <div class="col-md-4 padding-0 d-none"><input type="number" name="much" placeholder="{{__('app.How many appointment get to defer?')}}"></div>
                  <div class="col-md-4 padding-0"><input type="number" name="muchlate" placeholder="{{__('app.How mutch late in minutes?')}}"></div>
                  <div class="col-md-2"><button class="button btn-success">{{__('app.Finish appointment')}}</button></div>
                </div>
              </form>
              @endif
              <ul>
                  @foreach($appointment->subServices as $subservice)
                  <li>{{$subservice->title}}</li>
                  @endforeach
                  <li>@if($appointment->name && $appointment->phone) {{$appointment->name}} - {{$appointment->phone}} @else {{$appointment->user->name}} - {{$appointment->user->phone}} @endif</li>
                  <li><span>{{__('app.In date')}} <time>{{$appointment->date_start->format('Y-m-d')}}</time> {{__('app.From hour')}} {{$appointment->date_start->format('H:i')}} {{__('app.To hour')}} {{$appointment->date_end->format('H:i')}}</li>
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
<link rel="stylesheet" href="{{ asset('css/layout/jalalidatepicker.min.css') }}">

<script src="{{ asset('js/layout/jalalidatepicker.min.js') }}"></script>
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

jalaliDatepicker.startWatch({
	separatorChar: "-"
});
</script>

@endsection