@extends('layouts.app')

@section('content')



<div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box invoices with-icons margin-top-20 ">
            <h4>{{__('app.Update appointment')}}</h4>
            <form action="{{route('admin.appointment.update', $appointment->id)}}" method="post" class="edit-appointment utf_box_widget booking_widget_box">
            @csrf
            @method('put')

			@if($appointment->name && $appointment->phone)
			<div class="col-lg-12 col-md-12 select_name_box select_date_box ">
              <input type="text" name="name" value="{{$appointment->name}}" class="booking-name" placeholder="{{__('app.Name')}}" >
			  <i class="fa fa-user"></i>
            </div>

			<div class="col-lg-12 col-md-12 select_phone_box select_date_box ">
              <input type="text" name="phone" value="{{$appointment->phone}}" class="booking-phone" placeholder="{{__('app.Phone')}}">
			  <i class="fa fa-phone"></i>
            </div>
			@endif

            <input type="hidden" name="listing_id" value="{{$listing->id}}">
            <input type="hidden" name="appointment_id" value="{{$appointment->id}}">
			<div class="col-lg-12 col-md-12 select_subservice_box margin-bottom-20">
				<select name="service[]" required multiple  data-count-selected-text="{{__('app.Selected item {0}')}}"  data-placeholder="{{__('app.Choose items')}}" class="selectpicker default category" title="{{__('app.Choose items')}}" data-live-search="true" data-selected-text-format="count" data-size="5">
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
						<div class="panel-dropdown-scrollable">
							<div class="time-slot">
								<input type="radio" checked value="{{$appointment->date_start->format('H:i') . '|' . $appointment->date_end->format('H:i')}}" name="time_slot" id="time-slot-{{$appointment->date_start->format('H:i') . '|' . $appointment->date_end->format('H:i')}}">
								<label for="time-slot-{{$appointment->date_start->format('H:i') . '|' . $appointment->date_end->format('H:i')}}">
									<strong><span>1</span>{{__('app.From hour')}} {{$appointment->date_start->format('H:i')}} {{__('app.To hour')}} {{$appointment->date_end->format('H:i')}}</strong>									
								</label>
							</div>
						</div>
					</div>
				</div>

				<div class="errors alert alert-danger">
					<ul></ul>
				</div>


				@if($errors->any())
				<div class="errors2 alert alert-danger">
					<ul>@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach</ul>
				</div>
				@endif
			
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

<script>
	$('.selectpicker').selectpicker('val', {{$appointment->subServices->pluck('id')}});
</script>
@include('partials.assets.appointment-management')

@endsection

