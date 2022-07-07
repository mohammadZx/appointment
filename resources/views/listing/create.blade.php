@extends('layouts.app')

@section('content')

    @include('partials.listing.add-listing')

@endsection

@section('scripts')
@include('partials.assets.city-ajax')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="crossorigin="" />
<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
<link rel="stylesheet" type="text/css" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="crossorigin=""></script>
<script type='text/javascript' src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
<script type='text/javascript' src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>



<script>

  var theme = 'https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png';
    var lat = 35.715298;
    var lon = 51.404343;
    var alt =481;
    var macarte = null;
    var marker;
    //var trace = new Array();
    var i = 0;
    //var marker1;
    var markerClusters; // Servira à stocker les groupes de marqueurs
    var popup = L.popup();
        function initMap(){
            macarte = L.map('utf_single_listingmap').setView([lat, lon], 10);
            marker = L.marker({lat, lon}).addTo(macarte)
            macarte.addLayer(marker);

            markerClusters = L.markerClusterGroup;
            L.tileLayer(theme, {}).addTo(macarte);
            macarte.on('click', onMapClick);
        }


    function onMapClick(e) {
        macarte.removeLayer(marker)
        marker = L.marker(e.latlng).addTo(macarte)
        macarte.addLayer(marker);
        $('#latitude').val(e.latlng.lat)
        $('#longitude').val(e.latlng.lng)
    }

    $(".selectpicker.city").on('change', function(){
        var lat = $('.selectpicker.city').find(":selected").data('lat');
        var lon = $('.selectpicker.city').find(":selected").data('lon');
        macarte.setView([lat, lon], 15)
        macarte.removeLayer(marker)
        marker = L.marker({lat, lon}).addTo(macarte)
        macarte.addLayer(marker);
    })

    $(document).ready(function(){
        initMap();
    });

</script>

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