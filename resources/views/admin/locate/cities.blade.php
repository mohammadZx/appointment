@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
        <div class="add-province">
            <div class="row">
            <form class="changestatus-appointment margin-top-10" action="{{route('admin.city.store')}}" method="post">
                @csrf  
                 <div class="col-md-6"><input class="name" required type="text" name="name" placeholder="{{__('app.City name')}}"></div>
                    <div class="col-md-6"><select name="province_id" required data-placeholder="{{__('app.Province')}}" class="selectpicker with-ajax default province" title="{{__('app.Province')}}" data-live-search="true" data-selected-text-format="count" data-size="5"></select></div>
                 <div class="col-md-6"><button class="button margin-right-10">{{__('app.Add')}}</button></div>
              </form>
            </div>
        </div>
        <div class="utf_dashboard_list_box invoices province-list with-icons margin-top-20">
            <h4>{{__('app.City management')}}</h4>
            <ul>
              @foreach($cities as $city)
              <li><strong>{{$city->province->name}} - {{$city->name}}</strong></a>
              <form class="changestatus-appointment" action="{{route('admin.city.destroy', $city->id)}}" method="post">
                @csrf  
                @method('delete')
                {{__('app.Transform listings to')}}    
                    <select name="city_id" required data-placeholder="{{__('app.pages.index.City')}}" class="selectpicker with-ajax default city province" title="{{__('app.pages.index.City')}}" data-live-search="true" data-selected-text-format="count" data-size="5"></select>
                    {{__('app.And delete this city')}}
                  <button class="button margin-right-10">{{__('app.Delete')}}</button>
              </form> 
              <form class="changestatus-appointment margin-top-10" action="{{route('admin.city.store')}}" method="post">
                @csrf  
                <input type="hidden" name="city_id" value="{{$city->id}}">
                <input type="hidden" name="province_id" value="{{$city->province->id}}">
                 <input class="name" required type="text" name="name" placeholder="{{__('app.City name')}}" value="{{$city->name}}">
                  <button class="button margin-right-10">{{__('app.Edit')}}</button>
              </form>
              @endforeach
            </ul>
          </div>

		  <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $cities])
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
@include('partials.assets.city-ajax')
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