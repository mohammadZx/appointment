@extends('layouts.app')

@section('content')



<div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box invoices with-icons margin-top-20 ">
            <h4>{{__('app.Update SubService')}}</h4>
            <form class="changestatus-appointment margin-top-10" action="{{route('admin.subservice.update', $service->id)}}" method="post">
                @csrf  
                @method('put')
                 <div class="col-md-6">
                    <input class="title @error('title') invalid @enderror" required type="text" name="title" value="{{ old('title') ? old('title') : $service->title }}" placeholder="{{__('app.Title')}}">
                    @error('title') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror

                    
                    <select name="service_id" reuired style="width: 100%" class="margin-bottom-20 category @error('service_id') invalid @enderror" value="{{ old('service_id') ? old('service_id') : $service->service_id }}">
                        <option value="">{{__('app.Select Service')}}</option>
                        @foreach($mservices as $mservice)
                        <option value="{{$mservice->id}}" {{ (old('service_id') ? old('service_id') : $service->service_id) == $mservice->id ? 'selected' : null}}>{{$mservice->title}}</option>
                        @endforeach
                    </select>
                    @error('service_id') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror

              
                </div>
                 <div class="col-md-6">
                    <textarea name="content" class="content  @error('content') invalid @enderror" rows="3" placeholder="{{__('app.Content')}}">{{ old('content') ? old('content') : $service->content }}</textarea>
                    @error('content') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror
                </div>

                 <div class="col-md-6"><button class="button margin-right-10">{{__('app.Add')}}</button></div>
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


@endsection

