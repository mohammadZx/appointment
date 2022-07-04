@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
 

    <div class="utf_dashboard_content"> 
     
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="utf_dashboard_list_box margin-top-0">
            <h4 class="gray"><i class="sl sl-icon-user"></i> Profile Details</h4>
            <div class="utf_dashboard_list_box-static"> 
              <div class="edit-profile-photo"> <img src="/images/user-avatar.jpg" alt="">
                <div class="change-photo-btn">
                  <div class="photoUpload"> <span><i class="fa fa-upload"></i> Upload Photo</span>
                    <input type="file" class="upload" />
                  </div>
                </div>
              </div>
              <div class="my-profile">
			    <div class="row with-forms">
					<div class="col-md-4">
						<label>Name</label>						
						<input type="text" class="input-text" placeholder="Alex Daniel" value="">
					</div>
					<div class="col-md-4">
						<label>Phone</label>						
						<input type="text" class="input-text" placeholder="(123) 123-456" value="">
					</div>
					<div class="col-md-4">
						<label>Company</label>						
						<input type="text" class="input-text" placeholder="ABC Company" value="">
					</div>
					<div class="col-md-4">
						<label>Email</label>						
						<input type="text" class="input-text" placeholder="test@example.com" value="">
					</div>
					<div class="col-md-4">
						<label>Designation</label>						
						<input type="text" class="input-text" placeholder="Account Manager" value="">
					</div>
					<div class="col-md-4">
						<label>State</label>						
						<input type="text" class="input-text" placeholder="London" value="">
					</div>
					<div class="col-md-4">
						<label>Birth</label>						
						<input type="text" class="input-text" placeholder="20 March 2000" value="">
					</div>
					<div class="col-md-4">
						<label>Country</label>						
						<input type="text" class="input-text" placeholder="England" value="">
					</div>
					<div class="col-md-4">
						<label>Age</label>						
						<input type="text" class="input-text" placeholder="18 Year" value="">
					</div>
					<div class="col-md-12">
						<label>Address</label>
						<textarea name="notes" cols="30" rows="10">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</textarea>
					</div>
					<div class="col-md-12">
						<label>Notes</label>
						<textarea name="notes" cols="30" rows="10">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti.</textarea>
					</div>
					<div class="col-md-4">
						<label>Facebook</label>						
						<input type="text" class="input-text" placeholder="https://www.facebook.com" value="">
					</div>
					<div class="col-md-4">
						<label>Twitter</label>						
						<input type="text" class="input-text" placeholder="https://www.twitter.com" value="">
					</div>										
					<div class="col-md-4">
						<label>Linkedin</label>
						<input type="text" class="input-text" placeholder="https://www.linkedin.com" value="">						
					</div>
					<div class="col-md-4">
						<label>Google+</label>
						<input type="text" class="input-text" placeholder="https://plus.google.com" value="">						
					</div>
					<div class="col-md-4">
						<label>Instagram</label>
						<input type="text" class="input-text" placeholder="http://instagram.com" value="">						
					</div>
					<div class="col-md-4">
						<label>Skype</label>
						<input type="text" class="input-text" placeholder="https://www.skype.com" value="">						
					</div>
				  </div>	
              </div>
              <button class="button preview btn_center_item margin-top-15">Save Changes</button>
            </div>
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
</script>

@endsection