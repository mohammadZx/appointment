@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
 

    <div class="utf_dashboard_content"> 
     
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="utf_dashboard_list_box margin-top-0">
            <h4 class="gray"><i class="sl sl-icon-user"></i> {{__('app.Profile Details')}}</h4>
            <form class="utf_dashboard_list_box-static" enctype="multipart/form-data" action="{{route('admin.user.update', $user->id)}}" method="post">
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul class="errors">
						@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
			
			@csrf 
            @method('put')
              <div class="edit-profile-photo margin-top-10"> <img src="{{get_user_avatar($user->getMeta('user_avatar', true))}}" alt="">
                <div class="change-photo-btn">
                  <div class="photoUpload" title="{{__('app.Max size 500kb')}}"> <span><i class="fa fa-upload" ></i> {{__('app.Upload Photo')}}</span>
                    <input type="file" accept="image/*" name="image" class="upload" />
                  </div>
                </div>
              </div>
              <div class="my-profile">
			    <div class="row with-forms">
					<div class="col-md-4">
						<label>{{__('app.Email')}}</label>						
						<input name="email" type="text" class="input-text @error('email') invalid @enderror" placeholder="test@example.com" value="{{$user->email}}">
					</div>
					<div class="col-md-4">
						<label>{{__('app.Phone')}}</label>						
						<input name="phone" disabled type="text" class="input-text @error('phone') invalid @enderror" placeholder="09120000000" value="{{$user->phone}}">
					</div>
					<div class="col-md-4">
						<label>{{__('app.Name')}}</label>						
						<input name="name" required type="text" class="input-text @error('name') invalid @enderror" placeholder="{{__('app.Name')}}" value="{{$user->name}}">
					</div>				
					<div class="col-md-8">
						<label>{{__('app.Address')}}</label>
						<input name="address" type="text" name="address" class="input-text @error('address') invalid @enderror" placeholder="{{__('app.Address')}}" value="{{$user->getMeta('address', true)}}">
					</div>
					<div class="col-md-4">
						<label>{{__('app.State')}}</label>						
						<input name="state" type="text" class="input-text @error('state') invalid @enderror" placeholder="{{__('app.State')}}" value="{{$user->getMeta('state', true)}}">
					</div>
					<div class="col-md-12">
						<label>{{__('app.Bio')}}</label>
						<textarea name="bio" class=" @error('bio') invalid @enderror" cols="30" rows="10">{{$user->getMeta('bio', true)}}</textarea>
					</div>
				  </div>	
              </div>
              <button class="button preview btn_center_item margin-top-15">{{__('app.Save')}}</button>
			</form>
          </div>
        </div>
        <div class="col-md-12">
          <div class="footer_copyright_part">{{__('app.Copyright')}}</div>
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


var profilesrc = $('.edit-profile-photo img').attr('src')
document.querySelector('input[name="image"]').addEventListener('change', evt => {
  const [file] = document.querySelector('input[name="image"]').files
  if (file) {
	$('.edit-profile-photo img').attr('src', URL.createObjectURL(file))
  }else{
	$('.edit-profile-photo img').attr('src', profilesrc)
  }
})
</script>

@endsection