<link rel="stylesheet" href="{{ asset('css/layout/jalalidatepicker.min.css') }}">

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
	var appointment_id = $('input[name="appointment_id"]').val()

	$.post( "{{route('listing.get_times')}}", { date: date, services: services, _token: token, listing_id: listing_id, appointment_id: appointment_id }).done(function( res ) {
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
$('#booking-form').on('submit', function(e){
	if(!$('input[name="time_slot"]') || !$('input[name="time_slot"]').is(':checked')){
		e.preventDefault()
	}
})

function applybooking(){
	$('#booking-form').submit()
}

// getTimeSlots()
</script>