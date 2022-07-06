@extends('layouts.app')

@section('content')



<div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box invoices with-icons margin-top-20 ">
            <h4>{{__('app.Update appointment')}}</h4>
            <form action="{{route('user.appointment.update', $appointment->id)}}" method="post" class="edit-appointment utf_box_widget booking_widget_box">
            @csrf
            @method('put')
            <input type="hidden" name="listing_id" value="{{$listing->id}}">
			<div class="col-lg-12 col-md-12 select_subservice_box margin-bottom-20">
				<select name="service[]" required multiple  data-count-selected-text="موارد انتخاب شده {0} تا"  data-placeholder="{{__('app.Choose items')}}" class="selectpicker default category" title="{{__('app.Choose items')}}" data-live-search="true" data-selected-text-format="count" data-size="5">
					@foreach($listing->services as $service)
						<option value="{{$service->subservice->id}}">{{$service->subservice->title}}</option>
					@endforeach
				</select>
			</div>
            <div class="col-lg-12 col-md-12 select_date_box">
              <input type="text" id="date-picker" value="{{$appointment->date_start->format('Y-m-d')}}" name="date" required class="booking-date-picker" data-jdp placeholder="{{__('app.Select Date')}}" readonly="readonly">
			  <i class="fa fa-calendar"></i>
            </div>
  		    <div class="col-lg-12">
				<div class="panel-dropdown time-slots-dropdown">
					<a href="#">{{__('app.Choose Time Slot...')}}</a>
					<div class="panel-dropdown-content padding-reset">
						<div class="panel-dropdown-scrollable"></div>
					</div>
				</div>

				<div class="errors alert alert-danger">
					<ul>
		
					</ul>
				</div>
			
			<button class="utf_progress_button button fullwidth_block margin-top-5 ">{{__('app.Edit Booking')}}</button>  

            </form>
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
<!-- Maps --> 
<link rel="stylesheet" href="{{ asset('css/layout/jalalidatepicker.min.css') }}">

<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=fa"></script> 

<script src="{{ asset('js/layout/maps.js') }}"></script>
<script src="{{ asset('js/layout/jalalidatepicker.min.js') }}"></script>

<script>

function close_panel_dropdown() {
$('.panel-dropdown').removeClass("active");
	$('.fs-inner-container.content').removeClass("faded-out");
}
$('.panel-dropdown a').on('click', function(e) {
	if ($(this).parent().is(".active")) {
		close_panel_dropdown();
	} else {
		close_panel_dropdown();
		$(this).parent().addClass('active');
		$('.fs-inner-container.content').addClass("faded-out");
	}
	e.preventDefault();
});
$('.panel-buttons button').on('click', function(e) {
	$('.panel-dropdown').removeClass('active');
	$('.fs-inner-container.content').removeClass("faded-out");
});
var mouse_is_inside = false;
$('.panel-dropdown').hover(function() {
	mouse_is_inside = true;
}, function() {
	mouse_is_inside = false;
});
$("body").mouseup(function() {
	if (!mouse_is_inside) close_panel_dropdown();
});

jalaliDatepicker.startWatch({
	separatorChar: "-"
});

$('.booking-date-picker').on('change', getTimeSlots)
$('.select_subservice_box select').on('change', getTimeSlots)

function getTimeSlots(){
	var date = $('.booking-date-picker').val()
	var services = $('.select_subservice_box select').val()
	var token = $('input[name="_token"]').val()
	var listing_id = $('input[name="listing_id"]').val()

	$.post( "{{route('listing.get_times')}}", { date: date, services: services, _token: token, listing_id: listing_id }).done(function( res ) {
		$('.panel-dropdown-scrollable').html('')
		$('.errors ul').html('')

		if(res.errors){
			var errorsHtml = '';
			for(var error of Object.values(res.errors)){
				errorsHtml += `<li>${error}</li>`
			}

			$('.errors ul').append(errorsHtml)
			return
		}

		if(res.data){
			
			var html = '';
			var counter = 1;
			for(var stlotime of Object.values(res.data)){
				html += `
						<div class="time-slot">
							<input type="radio" value="${stlotime.time_start}|${stlotime.time_end}" name="time_slot" id="time-slot-${stlotime.time_start}">
							<label for="time-slot-${stlotime.time_start}">
								<strong><span>${counter++}</span> از ساعت ${stlotime.time_start} تا ساعت ${stlotime.time_end}</strong>									
							</label>
						</div>
				`
				counter++
			}
			$('.panel-dropdown-scrollable').html(html)
		}

  	});
}

$('.selectpicker').selectpicker('val', {{$appointment->subServices->pluck('id')}});
$('#booking-form').on('submit', function(e){
	if(!$('input[name="time_slot"]') || !$('input[name="time_slot"]').is(':checked')){
		e.preventDefault()
	}
})

function applybooking(){
	$('#booking-form').submit()
}

getTimeSlots()
</script>
@endsection