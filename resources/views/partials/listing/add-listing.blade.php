<div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>{{__('app.Add listing')}}</h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{route('home')}}">{{__('app.Home')}}</a></li>
              <li>{{__('app.Add listing')}}</li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container margin-bottom-75">
     <div class="row">
        <div class="col-lg-12">
          <div id="utf_add_listing_part">             
		
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-tag"></i> {{__('app.Listing information')}}</h3>
              </div>              
              <div class="row with-forms">
                <div class="col-md-12">
                  <h5>{{__('app.Listing title')}}</h5>
                  <input type="text" class="search-field" required name="listing_title" id="listing_title" placeholder="{{__('app.Listing title')}}" value="">
                </div>
              </div>              
              <div class="row with-forms">  
			  <div class="col-md-6">
                  <h5>{{__('app.Services')}}</h5>
                  <div class="intro-search-field utf-chosen-cat-single">
					  <select name="lilsting_services" class="selectpicker default" multiple required data-placeholder="{{__('app.Select services')}}" data-selected-text-format="count" data-size="7" title="{{__('app.Select services')}}">
						<option value="">{{__('app.Select a category')}}</option> 						
					  </select>
				  </div>
                </div>               
                <div class="col-md-6">
                  <h5>{{__('app.Category')}}</h5>
                  <div class="intro-search-field utf-chosen-cat-single">
					  <select name="lilsting_category" class="selectpicker default" data-count-selected-text="{{__('app.Selected item {0}')}}" data-placeholder="{{__('app.Select Category')}}"  data-live-search="true"  data-selected-text-format="count" data-size="7" title="{{__('app.Select Category')}}">
					  		@foreach($categories as $cat)
								<optgroup label="{{$cat->title}}">
									@foreach($cat->services as $service)
										<option value="{{$service->id}}">{{$service->title}}</option>
									@endforeach
								</optgroup>
							@endforeach					
					  </select>
				  </div>
                </div>
              </div>
            </div>
            
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-map"></i> {{__('app.Location')}}</h3>
              </div>
              <div class="utf_submit_section"> 
                <div class="row with-forms"> 				
                  <div class="col-md-6">
                    <h5>{{__('app.City')}}</h5>
					<div class="intro-search-field utf-chosen-cat-single">
					  <select  name="city" class="selectpicker default with-ajax city" data-placeholder="{{__('app.pages.index.City')}}" data-selected-text-format="count" data-size="7" data-live-search="true" title="{{__('app.pages.index.City')}}"></select>
				    </div>
                  </div>                  
                  <div class="col-md-6">
                    <h5>{{__('app.Address')}}</h5>                    
					<input type="text" class="input-text" name="address" id="address" placeholder="{{__('app.Address')}}" value="">
                  </div>                  
                  <div class="col-md-12">
                  <h5>Decimal Degrees</h5>                    
				  <div class="row with-forms">
					<div class="col-md-6">
						<input type="text" class="input-text" name="latitude" id="latitude" placeholder="40.7324319" value="">
					</div>
					<div class="col-md-6">                    
						<input type="text" class="input-text" name="longitude" id="longitude" placeholder="-73.824807777775" value="">
					</div> 
				  </div> 	
                  </div>				  				  
				  <div id="utf_listing_location" class="col-md-12 utf_listing_section">
					  <div id="utf_single_listing_map_block">
						<div id="utf_single_listingmap" data-latitude="40.7324319" data-longitude="-73.824807777775" data-map-icon="im im-icon-Hamburger"></div>
					  </div>
				  </div>
				  
                </div>
              </div>
            </div>
            
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-picture"></i> Images</h3>
              </div>			  
              <div class="row with-forms">              
				  <div class="utf_submit_section col-md-4">
				    <h4>Logo</h4>
					<form action="file-upload" class="dropzone"></form>
				  </div>
				  <div class="utf_submit_section col-md-4">
					<h4>Cover Image</h4>
					<form action="file-upload" class="dropzone"></form>
				  </div>
				  <div class="utf_submit_section col-md-4">
					<h4>Gallery Images</h4>
					<form action="file-upload" class="dropzone"></form>
				  </div>
			  </div>	  
            </div> 
			
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-list"></i> Name & Description</h3>
              </div>              
			  <div class="row with-forms">
				  <div class="col-md-6">
					<h5>Name</h5>
					<input type="text" placeholder="Name">
				  </div>	
				  <div class="col-md-6">
					<h5>Email</h5>
					<input type="text" placeholder="Email">
				  </div>
				  <div class="col-md-6">
					<h5>Title</h5>
					<input type="text" placeholder="Title">
				  </div>
				  <div class="col-md-6">
					<h5>Tagline</h5>
					<input type="text" placeholder="Tagline">
				  </div>				  				 
				  <div class="col-md-12">
					<h5>Description</h5>
					<textarea name="summary" cols="40" rows="3" id="description" placeholder="Description..." spellcheck="true"></textarea>
				  </div>
			  </div>                
            </div>

			<div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-home"></i> Amenities</h3>
              </div>              
              <div class="checkboxes in-row amenities_checkbox">
                <ul>
					<li>
						<input id="check-a" type="checkbox" name="check">
						<label for="check-a">Car Parking</label>
					</li>
					<li>
						<input id="check-b" type="checkbox" name="check">
						<label for="check-b">Takes Reservations</label>
					</li>
					<li>
						<input id="check-c" type="checkbox" name="check">
						<label for="check-c">Street Parking</label>
					</li>
					<li>
						<input id="check-d" type="checkbox" name="check">
						<label for="check-d">Elevator in Building</label>
					</li>
					<li>
						<input id="check-e" type="checkbox" name="check">
						<label for="check-e">Outdoor Seating</label>
					</li>
					<li>
						<input id="check-f" type="checkbox" name="check">
						<label for="check-f">Friendly Workspace</label>	
					</li>
					<li>
						<input id="check-g" type="checkbox" name="check">
						<label for="check-g">Wireless Internet</label>
					</li>
					<li>
						<input id="check-h" type="checkbox" name="check" >
						<label for="check-h">Good for Kids</label>
					</li>
					<li>
						<input id="check-i" type="checkbox" name="check" >
						<label for="check-i">Events</label>
					</li>
					<li>
						<input id="check-j" type="checkbox" name="check">
						<label for="check-j">Smoking Allowed</label>
					</li>
					<li>
						<input id="check-k" type="checkbox" name="check">
						<label for="check-k">Wheelchair Accessible</label>
					</li>
					<li>
						<input id="check-l" type="checkbox" name="check">
						<label for="check-l">Accepted Bank Cards</label>
					</li>
				</ul>				
              </div>              
            </div>
            
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-clock"></i> Opening Hours</h3>                
              </div>              
              <div class="switcher-content"> 
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
				  <div class="col-md-2">
                    <h5>Monday :-</h5>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
				  <div class="col-md-2">
                    <h5>Tuesday :-</h5>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
				  <div class="col-md-2">
                    <h5>Wednesday :-</h5>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
				  <div class="col-md-2">
                    <h5>Thursday :-</h5>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
				  <div class="col-md-2">
                    <h5>Friday :-</h5>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
				  <div class="col-md-2">
                    <h5>Saturday :-</h5>
                  </div>
                </div>
                
                <div class="row utf_opening_day utf_js_demo_hours">
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Open Time"></select>
                  </div>
                  <div class="col-md-5">
                    <select class="utf_chosen_select" data-placeholder="Close Time"></select>
                  </div>
				  <div class="col-md-2">
                    <h5>Sunday :-</h5>
                  </div>
                </div>
              </div>                            
            </div>
			
			<div class="add_utf_listing_section margin-top-45"> 
				<div class="utf_add_listing_part_headline_part">
					<h3><i class="sl sl-icon-tag"></i> Add Pricing</h3>
                </div>              
				<div class="row">
				  <div class="col-md-12">
					<table id="utf_pricing_list_section">
					  <tbody class="ui-sortable">
						<tr class="pricing-list-item pattern ui-sortable-handle">
						  <td><div class="fm-move"><i class="sl sl-icon-cursor-move"></i></div>
							<div class="fm-input pricing-name">
							  <input type="text" placeholder="Title">
							</div>
							<div class="fm-input pricing-ingredients">
							  <input type="text" placeholder="Description">
							</div>
							<div class="fm-input pricing-price"><i class="data-unit">$</i>
							  <input type="text" placeholder="Price" data-unit="$">
							</div>
							<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div></td>
						</tr>
					  </tbody>
					</table>
					<a href="#" class="button add-pricing-list-item">Add Item</a> <a href="#" class="button add-pricing-submenu">Add Category</a> </div>
				</div>                          
            </div>
			
			<div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-docs"></i> Your Listing Feature</h3>
              </div>              
              <div class="checkboxes in-row amenities_checkbox">
                <ul>
					<li>
						<input id="check-a1" type="checkbox" name="check">
						<label for="check-a1">Accepts Credit Cards</label>
					</li>
					<li>
						<input id="check-b1" type="checkbox" name="check">
						<label for="check-b1">Smoking Allowed</label>
					</li>
					<li>
						<input id="check-c1" type="checkbox" name="check">
						<label for="check-c1">Bike Parking</label>
					</li>
					<li>
						<input id="check-d1" type="checkbox" name="check">
						<label for="check-d1">Hostels</label>
					</li>
					<li>
						<input id="check-e1" type="checkbox" name="check">
						<label for="check-e1">Wheelchair Accessible</label>
					</li>
					<li>
						<input id="check-f1" type="checkbox" name="check">
						<label for="check-f1">Wheelchair Internet</label>	
					</li>
					<li>
						<input id="check-g1" type="checkbox" name="check">
						<label for="check-g1">Wheelchair Accessible</label>
					</li>
					<li>
						<input id="check-h1" type="checkbox" name="check" >
						<label for="check-h1">Parking Street</label>
					</li>
					<li>
						<input id="check-i1" type="checkbox" name="check" >
						<label for="check-i1">Wireless Internet</label>
					</li>					
				</ul>				
              </div>              
            </div>                        
            <a href="#" class="button preview"><i class="fa fa-arrow-circle-right"></i> Save & Preview</a> </div>
        </div>        
      </div>
  </div>
  
  <section class="utf_cta_area_item utf_cta_area2_block">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="utf_subscribe_block clearfix">                    
                    <div class="col-md-4 col-sm-5">
                        <div class="contact-form-action">
                            <form method="post">
                                <span class="la la-envelope-o"></span>
                                <input class="form-control" type="email" placeholder="Enter your email" required="">
                                <button class="utf_theme_btn" type="submit">Subscribe</button>
                            </form>
                        </div>
                    </div>
					<div class="col-md-8 col-sm-7">
                        <div class="section-heading">
                            <h2 class="utf_sec_title_item utf_sec_title_item2">Subscribe to Newsletter!</h2>
                            <p class="utf_sec_meta">
                                Subscribe to get latest updates and information.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
	</section>