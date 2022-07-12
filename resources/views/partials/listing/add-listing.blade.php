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
  
  <div class="container">
     <form class="row margin-bottom-15" action="{{route('user.listing.store')}}" method="POST">
      @csrf
        <div class="col-lg-12">
          <div id="utf_add_listing_part">             
		
            <div class="add_utf_listing_section"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-tag"></i> {{__('app.Listing information')}}</h3>
              </div>              
              <div class="row with-forms">
              
                <div class="col-md-6">
                  <h5>{{__('app.Category')}}</h5>
                  <div class="intro-search-field utf-chosen-cat-single">
					  <select name="listing_category" required class="selectpicker default" data-count-selected-text="{{__('app.Selected item {0}')}}" data-placeholder="{{__('app.Select Category')}}"  data-live-search="true"  data-selected-text-format="count" data-size="7" title="{{__('app.Select Category')}}">
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
                <div class="col-md-6">
                  <h5>{{__('app.Listing title')}}</h5>
                  <input type="text" class="search-field" required name="listing_title" id="listing_title" placeholder="{{__('app.Listing title')}}" value="">
                </div> 
                <div class="col-md-6">
                  <h5>{{__('app.Flexibility mode')}}</h5>
                  <input type="number" class="search-field" name="flexibility" id="flexibility" placeholder="{{__('app.Igonre interference for user in minute')}}" value="">
                </div> 
                <div class="col-md-6">
                  <h5>{{__('app.Listing capacity')}}</h5>
                  <input type="number" class="search-field" name="listing_capacity" id="listing_capacity" placeholder="{{__('app.Listing capacity')}}" value="">
                </div>


                <div class="col-md-4">
                  <h5>{{__('app.Listing fixed phone (optional)')}}</h5>
                  <input type="number" class="search-field" required name="fixed_phone" id="fixed_phone" placeholder="{{__('app.Listing fixed phone')}}" value="">
                </div> 

                <div class="col-md-4">
                  <h5>{{__('app.Listing instagram (optional)')}}</h5>
                  <input type="text" class="search-field" name="instagram" id="instagram" placeholder="{{__('app.Listing instagram')}}" value="">
                </div> 

                <div class="col-md-4">
                  <h5>{{__('app.Listing whatsapp (optional)')}}</h5>
                  <input type="number" class="search-field" required name="whatsapp" id="whatsapp" placeholder="{{__('app.Listing whatsapp')}}" value="">
                </div> 


                <div class="col-md-12">
                <textarea name="content" max="50000" placeholder="{{__('app.Listing Contenet')}}"></textarea>
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
					  <select  name="city" required class="selectpicker default with-ajax city" data-placeholder="{{__('app.pages.index.City')}}" data-selected-text-format="count" data-size="7" data-live-search="true" title="{{__('app.pages.index.City')}}"></select>
				    </div>
                  </div>                  
                  <div class="col-md-6">
                    <h5>{{__('app.Address')}}</h5>                    
					<input type="text" required class="input-text" name="address" id="address" placeholder="{{__('app.Address')}}" value="">
                  </div>                  
                  <div class="col-md-12 d-none">
                  <h5>Decimal Degrees</h5>                    
				  <div class="row with-forms">
					<div class="col-md-6">
						<input type="hidden" class="input-text" name="latitude" id="latitude" placeholder="40.7324319" value="">
					</div>
					<div class="col-md-6">                    
						<input type="hidden" class="input-text" name="longitude" id="longitude" placeholder="-73.824807777775" value="">
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
                <h3><i class="sl sl-icon-picture"></i> {{__('app.Images')}}</h3>
              </div>
                <div class="row">
                  <div class="utf_submit_section col">
                    <p>{{__('app.Insert your images. max size 500kb can accepted')}}</p>
                    <p>{{__('app.One image is required')}}</p>
                  </div>
                </div>
              <div class="row with-forms">              
                <div class="utf_submit_section col-md-12">
                <div class="dropzone" id="myDropzone"></div>
                </div>
			        </div>	  
            </div> 
			
          
            
            <div class="add_utf_listing_section margin-top-45"> 
              <div class="utf_add_listing_part_headline_part">
                <h3><i class="sl sl-icon-clock"></i> {{__('app.Opening Hours')}}</h3>                
              </div>              
              <div class="switcher-content"> 
              <table id="utf_hours_list_section">
                  <tbody class="ui-sortable">
                  <tr class="l-list-item pattern ui-sortable-handle">
                    <td>
                    <div class="fm-input pricing-name">
                      <select name="worktimes[item_1][workhours]" required>
                          <option value="saturday">{{__('app.saturday')}}</option>
                          <option value="sunday">{{__('app.sunday')}}</option>
                          <option value="monday">{{__('app.monday')}}</option>
                          <option value="tuesday">{{__('app.tuesday')}}</option>
                          <option value="wednesday">{{__('app.wednesday')}}</option>
                          <option value="thursday">{{__('app.thursday')}}</option>
                          <option value="friday">{{__('app.friday')}}</option>
                      </select>
                    </div>
                    <div class="fm-input pricing-ingredients">
                        <select name="worktimes[item_1][time_start]" class="time-select" required>
                          <option value="">{{__('app.Start time')}}</option>
                        </select>
                    </div>
                    <div class="fm-input pricing-ingredients">
                        <select name="worktimes[item_1][time_end]" class="time-select" required>
                          <option value="">{{__('app.End time')}}</option>
                        </select>
                    </div>
                    <div class="fm-input">
                      <select name="worktimes[item_1][type]" required>
                        <option value="main">{{__('app.Work time')}}</option>
                        <option value="slot">{{__('app.Rest time')}}</option>
                      </select>
                    </div>
                    <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div></td>
                  </tr>
                  </tbody>
                </table>
                <a href="#" class="button add-list-item">{{__('app.Add Day Item')}}</a></div>
              </div>                            
            </div>
			
			<div class="add_utf_listing_section margin-top-45"> 
				<div class="utf_add_listing_part_headline_part">
					<h3><i class="sl sl-icon-tag"></i> {{__('app.Service and pricing')}}</h3>
                </div>              
				<div class="row">
				  <div class="col-md-12">
					<table id="utf_pricing_list_section">
					  <tbody class="ui-sortable">
						<tr class="l-list-item pattern ui-sortable-handle">
						  <td>
							<div class="fm-input pricing-name intro-search-field utf-chosen-service-single">
                <select name="services[item_1][lilsting_services]" class="default subservice" required data-placeholder="{{__('app.Select service')}}" >
                  <option value="">{{__('app.Select service')}}</option>
                </select>
							</div>
              <div class="fm-input pricing-ingredients">
							  <input type="number" name="services[item_1][time]" required placeholder="{{__('app.Time for every booking. on minute')}}">
							</div>
							<div class="fm-input pricing-price"><i class="data-unit">$</i>
							  <input type="number" name="services[item_1][price]" required placeholder="{{__('app.Price in ' . PRICE_UNIT_EN)}}" data-unit="$">
							</div>
							<div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div></td>
						</tr>
					  </tbody>
					</table>
					<a href="#" class="button add-list-item">{{__('app.Add Service')}}</a></div>
				</div>                          
            </div>
	                       
            <button class="button preview"><i class="fa fa-arrow-circle-right"></i> {{__('app.Save')}}</button>
           </div>
        </div>        
      </form>
  </div>
  
 