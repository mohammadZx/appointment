@extends('layouts.app')

@section('content')

    @include('partials.listing.add-listing')

@endsection

@section('scripts')

@include('partials.assets.city-ajax')



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="crossorigin="" />
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="crossorigin=""></script>



<script>

  var theme = 'https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png';
    var lat = 35.715298;
    var lon = 51.404343;
    var macarte = null;
    var marker;
    var popup = L.popup();
        function initMap(){
            macarte = L.map('utf_single_listingmap').setView([lat, lon], 10);
            marker = L.marker({lat, lon}).addTo(macarte)
            macarte.addLayer(marker);
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


    
// js time slot hanle for add listing
let x = {
    slotInterval: 60,
    openTime: '00:00',
    closeTime: '00:00'
  };
  let startTime = moment(x.openTime, "HH:mm");
  let endTime = moment(x.closeTime, "HH:mm").add(1, 'days');

  let allTimes = null;
  
  //Loop over the times - only pushes time with 30 minutes interval
  while (startTime < endTime) {
    //Push times
    allTimes += `<option value="${startTime.format("HH:mm")}">${startTime.format("HH:mm")}</option>`;
    //Add interval of 30 minutes
    startTime.add(x.slotInterval, 'minutes');
  }

$('.time-select').each(function(index){
    $(this).append(allTimes)
})



// Add listing hour add item
$('.add-list-item').click(function(e){
  e.preventDefault()
  var i = $(this).parent().find('table .l-list-item').length + 1;
  html  = $(this).parent().find('table .l-list-item:nth-child(1)').html()

  html = html.replaceAll('item_1' , 'item_' + i)
  $(this).parent().find('table tbody').append(`<tr class="l-list-item pattern ui-sortable-handle">${html}</tr>`)

  $('.fm-close a').click(function(e){
    e.preventDefault()

    if( $(this).parent().parent().parent().parent().children().length > 1){
      $(this).parent().parent().parent().remove()
    }
  })
})


$('select[name="listing_category"]').on('change', function(){
  
  $.ajax({
    url: `/service/${$(this).val()}/subservices`,
  }).done(function(res) {

    $('.subservice').each(function(){

      var html = `<option value="">${$(this).data('placeholder')}</option>`;
      for(var data of res.data){
        html += `<option value="${data.id}">${data.title}</option>`;
      }
      $(this).html(html);
      $(this).val('');

    })
  });

  
});



</script>
<script src="{{ asset('js/layout/dropzone.js') }}"></script>

<script>
 Dropzone.options.myDropzone= {
    url: '{{route('listing.add_attachment')}}',
    autoProcessQueue: true,
    uploadMultiple: false,
    parallelUploads: 5,
    maxFiles: 5,
    maxFilesize: 1,
    acceptedFiles: 'image/*',
    addRemoveLinks: true,
    init: function(){
      this.on("sending", function(file, xhr, formData) {
        formData.append("_token", '{{ csrf_token() }}');
      })
    },
    removedfile: function(file) {
            var name = file.previewElement.id;
          $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            type: 'POST',
              url: '/listing/delete-attachment/' + name,
               });
            var fileRef;
            return (fileRef = file.previewElement) != null ? 
            fileRef.parentNode.removeChild(file.previewElement) : void 0;

      },

      success: function(file, response) {
    
				file.previewElement.id = response.success.id;
				file.name = response.success.name;
        var olddatadzname = file.previewElement.querySelector("[data-dz-name]");   
        file.previewElement.querySelector("img").alt = response.success.name;
        olddatadzname.innerHTML = response.success.name;
        },
    
}

</script>

@endsection