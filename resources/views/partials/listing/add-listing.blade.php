<div id="titlebar" class="gradient">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2>
            @if($edit)
            {{__('app.Edit listing')}}
            @else
            {{__('app.Add listing')}}
            @endif
          </h2>          
          <nav id="breadcrumbs">
            <ul>
              <li><a href="{{route('home')}}">{{__('app.Home')}}</a></li>
              <li>
              @if($edit)
              {{__('app.Edit listing')}}
              
              {{__('app.Add listing')}}
              @endif
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container">
     <form id="listing-manage" data-listing-id="{{$listing->id}}" class="row margin-bottom-15" data-type="{{$edit ? 'edit' : 'insert'}}" action="@if($edit){{route('user.listing.update', $listing->id)}}@else{{route('user.listing.store')}}@endif" method="POST">
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
					  <select name="listing_category" required value="{{$listing->service_id}}" data-value="{{$listing->service_id}}" class="selectpicker default @error('listing_category') invalid @enderror" data-count-selected-text="{{__('app.Selected item {0}')}}" data-placeholder="{{__('app.Select Category')}}"  data-live-search="true"  data-selected-text-format="count" data-size="7" title="{{__('app.Select Category')}}">
					  		@foreach($categories as $cat)
								<optgroup label="{{$cat->title}}">
									@foreach($cat->services as $service)
										<option value="{{$service->id}}" @if($service->id == $listing->service_id) selected @endif>{{$service->title}}</option>
									@endforeach
								</optgroup>
							@endforeach					
					  </select>
            @error('listing_category') 
              <span class="invalid-messsage">{{$message}}</span>
            @enderror
				  </div>
                </div>
                <div class="col-md-6">
                  <h5>{{__('app.Listing title')}}</h5>
                  <input type="text" class="search-field @error('listing_title') invalid @enderror" required name="listing_title" id="listing_title" placeholder="{{__('app.Listing title')}}" value="{{$listing->name}}">
                  @error('listing_title') 
                    <span class="invalid-messsage">{{$message}}</span>
                  @enderror
                </div> 
                <div class="col-md-6">
                  <h5>{{__('app.Flexibility mode')}}</h5>
                  <input type="number" value="{{$listing->flexibility ? $listing->flexibility : null }}" class="search-field @error('flexibility') invalid @enderror" name="flexibility" id="flexibility" placeholder="{{__('app.Igonre interference for user in minute')}}">
                  @error('flexibility') 
                    <span class="invalid-messsage">{{$message}}</span>
                  @enderror
                </div> 
                <div class="col-md-6">
                  <h5>{{__('app.Listing capacity')}}</h5>
                  <input type="number" value="{{$listing->capacity ? $listing->capacity : null }}" class="search-field @error('listing_capacity') invalid @enderror" name="listing_capacity" id="listing_capacity" placeholder="{{__('app.Listing capacity')}}">
                  @error('listing_capacity') 
                    <span class="invalid-messsage">{{$message}}</span>
                  @enderror
                </div>


                <div class="col-md-4">
                  <h5>{{__('app.Listing fixed phone (optional)')}}</h5>
                  <input type="number" class="search-field @error('fixed_phone') invalid @enderror" name="fixed_phone" id="fixed_phone" placeholder="02166934534" value="{{$listing->getMeta('fixed_phone', true)}}">
                  @error('fixed_phone') 
                    <span class="invalid-messsage">{{$message}}</span>
                  @enderror
                </div> 

                <div class="col-md-4">
                  <h5>{{__('app.Listing instagram (optional)')}}</h5>
                  <input type="text" class="search-field @error('instagram') invalid @enderror" name="instagram" id="instagram" placeholder="https://instagram.com/test_page" value="{{$listing->getMeta('social_instagram', true)}}">
                  @error('instagram') 
                    <span class="invalid-messsage">{{$message}}</span>
                  @enderror
                </div> 

                <div class="col-md-4">
                  <h5>{{__('app.Listing whatsapp (optional)')}}</h5>
                  <input type="number" class="search-field @error('whatsapp') invalid @enderror" name="whatsapp" id="whatsapp" placeholder="09120000000" value="{{$listing->getMeta('social_whatsapp', true)}}">
                  @error('whatsapp') 
                    <span class="invalid-messsage">{{$message}}</span>
                  @enderror
                </div> 


                <div class="col-md-12">
                <textarea name="content" class="@error('content') invalid @enderror" max="50000" placeholder="{{__('app.Listing Contenet')}}">{{$listing->content}}</textarea>
                @error('content') 
                    <span class="invalid-messsage">{{$message}}</span>
                  @enderror
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
                    <select  name="city" value="{{$listing->city_id}}" data-value="{{$listing->city_id}}" required class="selectpicker default with-ajax city @error('city') invalid @enderror" data-placeholder="{{__('app.pages.index.City')}}" data-selected-text-format="count" data-size="7" data-live-search="true" title="{{__('app.pages.index.City')}}"></select>
                    @error('city') 
                      <span class="invalid-messsage">{{$message}}</span>
                    @enderror
                  </div>
                  </div>                  
                  <div class="col-md-6">
                    <h5>{{__('app.Address')}}</h5>                    
					            <input type="text" value="{{$listing->address}}" required class="input-text @error('address') invalid @enderror" name="address" id="address" placeholder="{{__('app.Address')}}" value="">
                      @error('address') 
                        <span class="invalid-messsage">{{$message}}</span>
                      @enderror
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
				  <div id="utf_listing_location" class="col-md-12 utf_listing_section @error('latitude') invalid @enderror @error('longitude') invalid @enderror">
					  <div id="utf_single_listing_map_block">
              @if($edit)
              @php list($lat, $lon) = explode(',', $listing->getMeta('map', true)) @endphp
						  <div id="utf_single_listingmap" data-lat="{{$lat}}" data-lon="{{$lon}}"></div>
            @else
						  <div id="utf_single_listingmap" data-lat="35.715298" data-lon="51.404343"></div>
            @endif
					  </div>
				  
            @error('latitude') 
              <span class="invalid-messsage">{{$message}}</span>
            @enderror
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
                    @error('image') 
                      <span class="invalid-messsage">{{$message}}</span>
                    @enderror
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
                    @if($edit)
                    @php $i = 1; @endphp
                      @foreach($listing->times as $time)
                      <tr class="l-list-item pattern ui-sortable-handle">
                      <td>
                      <div class="fm-input pricing-name">
                        <select name="worktimes[item_{{$i}}][workhours]" data-value="{{$time->week_day}}" required>
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
                          <select name="worktimes[item_{{$i}}][time_start]"  data-value="{{$time->time_start}}" class="time-select" required>
                            <option value="">{{__('app.Start time')}}</option>
                          </select>
                      </div>
                      <div class="fm-input pricing-ingredients">
                          <select name="worktimes[item_{{$i}}][time_end]" data-value="{{$time->time_end}}" class="time-select" required>
                            <option value="">{{__('app.End time')}}</option>
                          </select>
                      </div>
                      <div class="fm-input">
                        <select name="worktimes[item_{{$i}}][type]" data-value="{{$time->type}}" required>
                          <option value="main">{{__('app.Work time')}}</option>
                          <option value="slot">{{__('app.Rest time')}}</option>
                        </select>
                      </div>
                      <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div></td>
                    </tr>
                    @php $i++; @endphp
                      @endforeach
                    @else
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
                  @endif
                  </tbody>
                </table>
                @error('worktimes') 
                  <span class="invalid-messsage">{{$message}}</span>
                @enderror
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
            @if($edit)
            @php $i = 1; @endphp
                  @foreach($listing->services as $service)
                  <tr class="l-list-item pattern ui-sortable-handle">
                    <td>
                    <div class="fm-input pricing-name intro-search-field utf-chosen-service-single">
                      <select name="services[item_{{$i}}][lilsting_services]" value="{{$service->subService->id}}" class="default subservice" required data-placeholder="{{__('app.Select service')}}" >
                          @foreach($listing->service->subservices as $services)
                        <option value="{{$services->id}}" @if($services->id == $service->subService->id) selected @endif>{{$services->title}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="fm-input pricing-ingredients">
                      <input type="number" name="services[item_{{$i}}][time]" value="{{$service->time}}" required placeholder="{{__('app.Time for every booking. on minute')}}">
                    </div>
                    <div class="fm-input pricing-price"><i class="data-unit">$</i>
                      <input type="number" name="services[item_{{$i}}][price]" value="{{$service->price}}" required placeholder="{{__('app.Price in ' . PRICE_UNIT_EN)}}" data-unit="$">
                    </div>
                    <div class="fm-close"><a class="delete" href="#"><i class="fa fa-remove"></i></a></div></td>
                  </tr>
                  @php $i++ @endphp
                  @endforeach
            @else
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
            @endif
					  </tbody>
					</table>
          @error('services') 
            <span class="invalid-messsage">{{$message}}</span>
          @enderror
					<a href="#" class="button add-list-item">{{__('app.Add Service')}}</a></div>
				</div>                          
            </div>
	                       
            <button class="button preview"><i class="fa fa-arrow-circle-right"></i> {{__('app.Save')}}</button>
           </div>
        </div>        
      </form>
  </div>
  
 