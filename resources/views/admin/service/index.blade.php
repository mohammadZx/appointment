@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
        <div class="add-province">
            <div class="row">
            <form class="changestatus-appointment margin-top-10" action="{{route('admin.service.store')}}" enctype="multipart/form-data" method="post">
                @csrf  
                 <div class="col-md-6">
                    <input class="title @error('title') invalid @enderror" required type="text" name="title" value="{{ old('title') }}" placeholder="{{__('app.Title')}}">
                    @error('title') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror

                    <input class="icon @error('icon') invalid @enderror" type="text" name="icon" value="{{ old('icon') }}" placeholder="{{__('app.Icon')}} font awesome and icon minds">
                    @error('icon') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror


                    <select name="category_id" reuired style="width: 100%" class="margin-bottom-20 category @error('category_id') invalid @enderror" value="{{ old('cateogry_id') }}">
                        <option value="">{{__('app.Select Category')}}</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : null}}>{{$category->title}}</option>
                        @endforeach
                    </select>
                    @error('category_id') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror


                    <input type="file" class="image  @error('image') invalid @enderror" name="image" accept="image/*">
                    @error('image') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror
                </div>
                 <div class="col-md-6">
                    <textarea name="content" class="content  @error('content') invalid @enderror" rows="8" placeholder="{{__('app.Content')}}">{{ old('content') }}</textarea>
                    @error('content') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror
                </div>

                 <div class="col-md-6"><button class="button margin-right-10">{{__('app.Add')}}</button></div>
              </form>
            </div>
        </div>
        <div class="utf_dashboard_list_box invoices province-list with-icons margin-top-20">
            <h4>{{__('app.Service management')}}</h4>
            <ul>
              @foreach($services as $service)
              <li><strong>{{$service->title}} -- {{$service->listings->count()}}</strong></a>

              <form class="changestatus-appointment" action="{{route('admin.service.destroy', $service->id)}}" method="post">
                @csrf  
                @method('delete')
                {{__('app.Transform Listings to')}}    
                    <select name="service_listing" class="padding-0 width-200px" required>
                        <option value="">{{__('app.Select Service')}}</option>
                        @foreach($services as $tcat)
                            <option value="{{$tcat->id}}">{{$tcat->title}}</option>
                        @endforeach
                    </select>
                    {{__('app.This service and transform sub services to')}}
                    <select name="service_sub" class="padding-0 width-200px" required>
                        <option value="">{{__('app.Select Service')}}</option>
                        @foreach($services as $tcat)
                            <option value="{{$tcat->id}}">{{$tcat->title}}</option>
                        @endforeach
                    </select>
                    {{__('app.And delete this service')}}
                  <button class="button margin-right-10">{{__('app.Delete')}}</button>
                  <a class="button margin-right-20" href="{{route('admin.service.edit', $service->id)}}">{{__('app.Edit')}}</a>
              </form> 
              @endforeach
            </ul>
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