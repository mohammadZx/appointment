@extends('layouts.app')
@section('seo_title', get_title(__('app.Edit category')))

@section('content')



<div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box invoices with-icons margin-top-20 ">
            <h4>{{__('app.Update Category')}}</h4>
            <form class="changestatus-appointment margin-top-10" action="{{route('admin.category.update', $category->id)}}" enctype="multipart/form-data" method="post">
                @csrf  
                @method('put')
                 <div class="col-md-6">
                    <input class="title @error('title') invalid @enderror" required type="text" name="title" value="{{ old('title') ? old('title') : $category->title }}" placeholder="{{__('app.Title')}}">
                    @error('title') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror

                    <input class="icon @error('icon') invalid @enderror" type="text" name="icon" value="{{ old('icon') ? old('icon') : $category->icon }}" placeholder="{{__('app.Icon')}} font awesome and icon minds">
                    @error('icon') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror

                    <input type="file" class="image  @error('image') invalid @enderror" name="image" accept="image/*">
                    @error('image') 
                        <span class="invalid-messsage">{{$message}}</span>
                    @enderror
                    @if($category->thumbnail_id)
                    <img width="300" src="{{get_image($category->thumbnail_id)}}" alt="">
                    @endif
                </div>
                 <div class="col-md-6">
                    <textarea name="content" class="content  @error('content') invalid @enderror" rows="6.5" placeholder="{{__('app.Content')}}">{{ old('content') ? old('content') : $category->content }}</textarea>
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

