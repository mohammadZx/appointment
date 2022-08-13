@extends('layouts.app')
@section('seo_title', get_title(__('app.Sub Service')))
@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
        @can('insert_subservice')
        <div class="add-province">
            <div class="row">
            <form class="changestatus-appointment margin-top-10" action="{{route('admin.subservice.store')}}" enctype="multipart/form-data" method="post">
                @csrf  
                 <div class="col-md-6">
                    <input class="title @error('title') invalid @enderror" required type="text" name="title" value="{{ old('title') }}" placeholder="{{__('app.Title')}}">
                    @error('title') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror


                    <select name="service_id" reuired style="width: 100%" class="margin-bottom-20 service @error('service_id') invalid @enderror" value="{{ old('service_id') }}">
                        <option value="">{{__('app.Select Service')}}</option>
                        @foreach($mservices as $mservice)
                        <option value="{{$mservice->id}}" {{ old('service_id') == $mservice->id ? 'selected' : null}}>{{$mservice->title}}</option>
                        @endforeach
                    </select>
                    @error('service_id') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror

                </div>
                 <div class="col-md-6">
                    <textarea name="content" class="content  @error('content') invalid @enderror" rows="2" placeholder="{{__('app.Content')}}">{{ old('content') }}</textarea>
                    @error('content') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror
                </div>

                 <div class="col-md-6"><button class="button margin-right-10">{{__('app.Add')}}</button></div>
              </form>
            </div>
        </div>
        @endcan
        <div class="utf_dashboard_list_box invoices province-list with-icons margin-top-20">
            <h4>{{__('app.Sub Service management')}}</h4>
            <ul class="admin user-subservices">
              @foreach($services as $service)
              <li><strong>{{$service->title}} -- {{$service->listings->count()}}</strong> {{__('app.to')}} {{$service->service->title}}</a>

              @can('delete_subservice')
              <form class="changestatus-appointment" action="{{route('admin.subservice.destroy', $service->id)}}" method="post">
                @csrf  
                @method('delete')
                {{__('app.Transform Listings to')}}    
                    <select name="subservice_listing" class="padding-0 width-200px" required>
                        <option value="">{{__('app.Select SubService')}}</option>
                        @foreach($aservices as $tcat)
                            <option value="{{$tcat->id}}">{{$tcat->title}}</option>
                        @endforeach
                    </select>

                    
                    {{__('app.This service and transform appointments to')}}
                    <select name="subservice_appointments" class="padding-0 width-200px" required>
                        <option value="">{{__('app.Select SubService')}}</option>
                        @foreach($aservices as $tcat)
                            <option value="{{$tcat->id}}">{{$tcat->title}}</option>
                        @endforeach
                    </select>
                    {{__('app.And delete this SubService')}}
                  <button class="button margin-right-10">{{__('app.Delete')}}</button>
                  @can('edit_subservice')
                  <a class="button margin-right-20" href="{{route('admin.subservice.edit', $service->id)}}">{{__('app.Edit')}}</a>
                @endcan
                </form> 
              @endcan
              @endforeach
            </ul>
          </div>

          <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $services])
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