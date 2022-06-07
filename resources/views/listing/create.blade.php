@extends('layouts.app')

@section('content')

    @include('partials.listing.add-listing')

@endsection

@section('scripts')

<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> 
<script src="{{ asset('js/layout/infobox.min.js') }}"></script>
<script src="{{ asset('js/layout/markerclusterer.js') }}"></script>
<script src="{{ asset('js/layout/maps.js') }}"></script>
<script>
$(".utf_opening_day.utf_js_demo_hours .utf_chosen_select").each(function() {
	$(this).append(''+
        '<option></option>'+
        '<option>Closed</option>'+
        '<option>1 AM</option>'+
        '<option>2 AM</option>'+
        '<option>3 AM</option>'+
        '<option>4 AM</option>'+
        '<option>5 AM</option>'+
        '<option>6 AM</option>'+
        '<option>7 AM</option>'+
        '<option>8 AM</option>'+
        '<option>9 AM</option>'+
        '<option>10 AM</option>'+
        '<option>11 AM</option>'+
        '<option>12 AM</option>'+
        '<option>1 PM</option>'+
        '<option>2 PM</option>'+
        '<option>3 PM</option>'+
        '<option>4 PM</option>'+
        '<option>5 PM</option>'+
        '<option>6 PM</option>'+
        '<option>7 PM</option>'+
        '<option>8 PM</option>'+
        '<option>9 PM</option>'+
        '<option>10 PM</option>'+
        '<option>11 PM</option>'+
        '<option>12 PM</option>');
});
</script> 
<script src="{{ asset('js/layout/dropzone.js') }}"></script>

@endsection