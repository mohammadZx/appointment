@extends('layouts.app')
@section('seo_title', get_title(__('app.Provinces')))
@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
    @can('insert_province')
        <div class="add-province">
            <div class="row">
            <form class="changestatus-appointment margin-top-10" action="{{route('admin.province.store')}}" method="post">
                @csrf  
                 <div class="col-md-6"><input class="name" required type="text" name="name" placeholder="{{__('app.Province name')}}"></div>
                <div class="col-md-6"><button class="button margin-right-10">{{__('app.Add')}}</button></div>
              </form>
            </div>
        </div>
        @endcan
        <div class="utf_dashboard_list_box invoices province-list with-icons margin-top-20">
            <h4>{{__('app.Provinces management')}}</h4>
            <ul class="admin user-province">
              @foreach($provinces as $province)
              <li><strong>{{$province->name}}</strong></a>

              @can('delete_province')
              <form class="changestatus-appointment" action="{{route('admin.province.destroy', $province->id)}}" method="post">
                @csrf  
                @method('delete')
                {{__('app.Transform cities to ')}}    
                    <select name="province_id" required data-placeholder="{{__('app.Province')}}" class="selectpicker with-ajax default province" title="{{__('app.Province')}}" data-live-search="true" data-selected-text-format="count" data-size="5"></select>
                    {{__('app.And delete this province')}}
                  <button class="button margin-right-10">{{__('app.Delete')}}</button>
              </form>
              @endcan 
              @can('edit_province')
              <form class="changestatus-appointment margin-top-10" action="{{route('admin.province.store')}}" method="post">
                @csrf  
                <input type="hidden" name="province_id" value="{{$province->id}}">
                 <input class="name" required type="text" name="name" placeholder="{{__('app.Province name')}}" value="{{$province->name}}">
                  <button class="button margin-right-10">{{__('app.Edit')}}</button>
              </form>
              @endcan
              <br>
              <a href="{{route('admin.city.index')}}?pid={{$province->id}}" class="button">{{__('app.See the cities of this province')}}</a>
              @endforeach
            </ul>
          </div>

		  <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $provinces])
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