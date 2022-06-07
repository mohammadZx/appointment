@extends('layouts.app')

@section('content')

<div id="utf_listing_gallery_part" class="utf_listing_section">
    <div class="utf_listing_slider utf_gallery_container margin-bottom-0"> 
		<a href="/images/single-listing-01.jpg" data-background-image="/images/single-listing-01.jpg" class="item utf_gallery"></a> 
		<a href="/images/single-listing-02.jpg" data-background-image="/images/single-listing-02.jpg" class="item utf_gallery"></a> 
		<a href="/images/single-listing-03.jpg" data-background-image="/images/single-listing-03.jpg" class="item utf_gallery"></a> 
		<a href="/images/single-listing-04.jpg" data-background-image="/images/single-listing-04.jpg" class="item utf_gallery"></a> 
	</div>
  </div>    

  <div class="container">
    <div class="row utf_sticky_main_wrapper">
      <div class="col-lg-8 col-md-8">
        <div id="titlebar" class="utf_listing_titlebar">
          <div class="utf_listing_titlebar_title">
           <h2>The Hot and More Restaurant <span class="listing-tag">Restaurant</span></h2>		   
            <span> <a href="#utf_listing_location" class="listing-address">The Ritz-Carlton, Hong Kong <i class="sl sl-icon-location"></i></a> </span>			
			<span class="call_now">(415) 796-3633 <i class="sl sl-icon-phone"></i></span>
            <div class="utf_star_rating_section" data-rating="4.5">
              <div class="utf_counter_star_rating">(4.5) / (14 Reviews)</div>
            </div>
            <ul class="listing_item_social">
              <li><a href="#">Bookmark <i class="fa fa-bookmark"></i></a></li>
			  <li><a href="#">Add Review <i class="fa fa-star"></i></a></li>              
              <li><a href="#">Featured <i class="fa fa-flag"></i></a></li>
              <li><a href="#">Share <i class="fa fa-share"></i></a></li>
			  <li><a href="#" class="now_open">Open Now</a></li>
            </ul>			
          </div>
        </div>
        <div id="utf_listing_overview" class="utf_listing_section">
          <h3 class="utf_listing_headline_part margin-top-30 margin-bottom-30">Listing Description</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam. Sed tempor iaculis massa faucibus feugiat. In fermentum facilisis massa, a consequat purus viverra.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat. Curabitur convallis fringilla diam sed aliquam.</p>
		  <div id="utf_listing_tags" class="utf_listing_section listing_tags_section margin-bottom-10 margin-top-0">          
		    <a href="#"><i class="sl sl-icon-phone" aria-hidden="true"></i> +(01) 1123-254-456</a>			
			<a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> info@example.com</a>	
			<a href="#"><i class="sl sl-icon-globe" aria-hidden="true"></i> www.example.com</a>			
          </div>
		  <div class="social-contact">
			<a href="#" class="facebook-link"><i class="fa fa-facebook"></i> Facebook</a>
			<a href="#" class="twitter-link"><i class="fa fa-twitter"></i> Twitter</a>
			<a href="#" class="instagram-link"><i class="fa fa-instagram"></i> Instagram</a>
			<a href="#" class="linkedin-link"><i class="fa fa-linkedin"></i> Linkedin</a>
			<a href="#" class="youtube-link"><i class="fa fa-youtube-play"></i> Youtube</a>
		  </div>		  		 
        </div>
		
		<div id="utf_listing_tags" class="utf_listing_section listing_tags_section">
          <h3 class="utf_listing_headline_part margin-top-30 margin-bottom-40">Listings Tags</h3>
			<a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Food</a>
			<a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Fruits</a>
			<a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Lunch</a>
			<a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Menu</a>
			<a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Parking</a>
			<a href="#"><i class="fa fa-tag" aria-hidden="true"></i> Restaurant</a>
        </div>
        
        <div class="utf_listing_section">
          <h3 class="utf_listing_headline_part margin-top-50 margin-bottom-40">Pricing</h3>
          <div class="show-more">
            <div class="utf_pricing_list_section">
              <h4>Menu Listing</h4>
              <ul>
                <li>
                  <h5>Burger <sub class="ppl-offer label-light-success">20% Off</sub></h5>
                  <p>Beef, Salad, Mayonnaise, Spicey Relish, Cheese</p>
                  <span>$120</span> 
				</li>
                <li>
                  <h5>Goat Cheese Mousse</h5>
                  <p>Caramelized Fig, Plums, Macadamia Nuts and Sorrel</p>
                  <span>$150</span> 
				</li>
                <li>
                  <h5>Pizza <sub class="ppl-offer label-light-success">10% Off</sub></h5>
				  <p>Cheddar Cheese, Lettuce, Tomato, Onion, Dill Pickles</p>
                  <span>$130</span> 
				</li>
				<li>
                  <h5>French Crostini <sub class="ppl-offer label-light-success">10% Off</sub></h5>
				  <p>Breakfast Sandwich on a Roll with 2 Eggs</p>
                  <span>$130</span> 
				</li>
				<li>
                  <h5>Caramelised Rum Punch <sub class="ppl-offer label-light-success">15% Off</sub></h5>
				  <p>Caramelised Mount Gay Eclipse with a Picked Watermelon</p>
                  <span>$120</span> 
				</li>		
                <li>
                  <h5><strong>Tatel Price</strong></h5>
                  <span><strong>$650</strong></span> 
				</li>
              </ul>
            </div>
          </div>
          <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i class="fa fa-angle-double-down"></i></a> 
		</div>
		
		<div id="utf_listing_amenities" class="utf_listing_section">
          <h3 class="utf_listing_headline_part margin-top-50 margin-bottom-40">Features</h3>
          <ul class="utf_listing_features checkboxes margin-top-0">
            <li>Air Conditioned</li>
            <li>Swimming Pool</li>
            <li>Room Service</li>
            <li>Luxury Bedding</li>
            <li>Free Wifi</li>
            <li>Bath Towel</li>
			<li>Wireless Internet</li>
            <li>Free Parking on premises</li>
            <li>Free Parking on Street</li>
            <li>Live Music</li>            
            <li>Indoor Pool</li>            
          </ul>
        </div>
		
		<div id="utf_listing_faq" class="utf_listing_section">
          <h3 class="utf_listing_headline_part margin-top-50 margin-bottom-40">Listing FAQ's</h3>
          <div class="style-2">
			<div class="accordion">
			  <h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon"></span><i class="sl sl-icon-plus"></i> (1) How to Open an Account?</h3>
			  <div>
				<p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
			  </div>
			  <h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon"></span><i class="sl sl-icon-plus"></i> (2) How to Add Listing?</h3>
			  <div>
				<p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
			  </div>
			  <h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon"></span><i class="sl sl-icon-plus"></i> (3) What is Featured Listing?</h3>
			  <div>
				<p>Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum is simply dummy text of the printing and type setting industry.</p>
			  </div>			  			  				  			  
			</div>
		  </div>
        </div>
		
        <div id="utf_listing_location" class="utf_listing_section">
          <h3 class="utf_listing_headline_part margin-top-60 margin-bottom-40">Location</h3>
          <div id="utf_single_listing_map_block">
            <div id="utf_single_listingmap" data-latitude="36.778259" data-longitude="-119.417931" data-map-icon="im im-icon-Hamburger"></div>
            <a href="#" id="utf_street_view_btn">Street View</a> 
		  </div>
        </div>
        <div id="utf_listing_reviews" class="utf_listing_section">
          <h3 class="utf_listing_headline_part margin-top-75 margin-bottom-20">Reviews <span>(08)</span></h3>
          <div class="clearfix"></div>
		  <div class="reviews-container">
			<div class="row">
				<div class="col-lg-9">
					<div class="row">
						<div class="col-lg-2 review_progres_title"><small><strong>Quality</strong></small></div>
						<div class="col-lg-9">
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="col-lg-1 review_progres_title"><small><strong>77</strong></small></div>
					</div>
					<div class="row">
						<div class="col-lg-2 review_progres_title"><small><strong>Space</strong></small></div>
						<div class="col-lg-9">
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="col-lg-1 review_progres_title"><small><strong>15</strong></small></div>
					</div>
					<div class="row">
						<div class="col-lg-2 review_progres_title"><small><strong>Price</strong></small></div>
						<div class="col-lg-9">
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="col-lg-1 review_progres_title"><small><strong>18</strong></small></div>
					</div>
					<div class="row">
						<div class="col-lg-2 review_progres_title"><small><strong>Service</strong></small></div>
						<div class="col-lg-9">
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="col-lg-1 review_progres_title"><small><strong>10</strong></small></div>
					</div>
					<div class="row">
						<div class="col-lg-2 review_progres_title"><small><strong>Location</strong></small></div>
						<div class="col-lg-9">
							<div class="progress">
								<div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
						<div class="col-lg-1 review_progres_title"><small><strong>05</strong></small></div>
					</div>
				</div>
				<div class="col-lg-3">
					<div id="review_summary">
						<strong>4.5</strong>
						<em>Superb Reviews</em>
						<small>Out of 15 Reviews</small>
					</div>
				</div>
			</div>
		  </div>	
          <div class="comments utf_listing_reviews">
            <ul>
              <li>
                <div class="avatar"><img src="/images/client-avatar1.jpg" alt="" /></div>
                <div class="utf_comment_content">
                  <div class="utf_arrow_comment"></div>
                  <div class="utf_star_rating_section" data-rating="5"></div>
				  <a href="#" class="rate-review">Helpful Review <i class="fa fa-thumbs-up"></i></a>                   
                  <div class="utf_by_comment">Francis Burton<span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2019 - 8:52 am</span> </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat.</p>                                    
				</div>
              </li>
              <li>
                <div class="avatar"><img src="/images/client-avatar2.jpg" alt="" /> </div>
                <div class="utf_comment_content">
                  <div class="utf_arrow_comment"></div>
                  <div class="utf_star_rating_section" data-rating="4"></div>
				  <a href="#" class="rate-review">Helpful Review <i class="fa fa-thumbs-up"></i></a>                  
                  <div class="utf_by_comment">Francis Burton<span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2019 - 8:52 am</span> </div>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat.</p>                  
				</div>
              </li>
			  <li>
                <div class="avatar"><img src="/images/client-avatar3.jpg" alt="" /> </div>
                <div class="utf_comment_content">
                  <div class="utf_arrow_comment"></div>
                  <div class="utf_star_rating_section" data-rating="4"></div>                  
                  <div class="utf_by_comment">Francis Burton<span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2019 - 8:52 am</span> </div>
				  <a href="#" class="rate-review">Helpful Review <i class="fa fa-thumbs-up"></i></a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat.</p>                  
				</div>
              </li>
              <li>
                <div class="avatar"><img src="/images/client-avatar1.jpg" alt="" /></div>
                <div class="utf_comment_content">
                  <div class="utf_arrow_comment"></div>
                  <div class="utf_star_rating_section" data-rating="4.5"></div>                  
                  <div class="utf_by_comment">Francis Burton<span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2019 - 8:52 am</span> </div>
				  <a href="#" class="rate-review">Helpful Review <i class="fa fa-thumbs-up"></i></a> 
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat.</p>
                  <div class="review-images utf_gallery_container"> 
				    <a href="/images/review-image-01.jpg" class="utf_gallery"><img src="/images/review-image-01.jpg" alt=""></a> 
					<a href="/images/review-image-02.jpg" class="utf_gallery"><img src="/images/review-image-02.jpg" alt=""></a> 
					<a href="/images/review-image-03.jpg" class="utf_gallery"><img src="/images/review-image-03.jpg" alt=""></a> 
					<a href="/images/review-image-01.jpg" class="utf_gallery"><img src="/images/review-image-01.jpg" alt=""></a> 
					<a href="/images/review-image-02.jpg" class="utf_gallery"><img src="/images/review-image-02.jpg" alt=""></a> 
					<a href="/images/review-image-03.jpg" class="utf_gallery"><img src="/images/review-image-03.jpg" alt=""></a> 
				  </div>                  
				</div>
              </li>
			  <li>
                <div class="avatar"><img src="/images/client-avatar3.jpg" alt="" /> </div>
                <div class="utf_comment_content">
                  <div class="utf_arrow_comment"></div>
                  <div class="utf_star_rating_section" data-rating="4"></div>                  
                  <div class="utf_by_comment">Francis Burton<span class="date"><i class="fa fa-clock-o"></i> Jan 05, 2019 - 8:52 am</span> </div>
				  <a href="#" class="rate-review">Helpful Review <i class="fa fa-thumbs-up"></i></a>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla finibus lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et pulvinar nisi tincidunt. Aliquam erat volutpat.</p>                  
				</div>
              </li>
            </ul>
          </div>
          <div class="clearfix"></div>
          <div class="row">
            <div class="col-md-12">
              <div class="utf_pagination_container_part margin-top-30">
                <nav class="pagination">
                  <ul>
                    <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                    <li><a href="#" class="current-page">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="sl sl-icon-arrow-left"></i></a></li>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>
        <div id="utf_add_review" class="utf_add_review-box">
          <h3 class="utf_listing_headline_part margin-bottom-20">Add Your Review</h3>
          <span class="utf_leave_rating_title">Your email address will not be published.</span>
          <div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
              <div class="add-review-photos margin-bottom-30">
                <div class="photoUpload"> <span>Upload Photo <i class="sl sl-icon-arrow-up-circle"></i></span>
                  <input type="file" class="upload" />
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="clearfix"></div>
              <div class="utf_leave_rating margin-bottom-30">
                <input type="radio" name="rating" id="rating-1" value="1"/>
                <label for="rating-1" class="fa fa-star"></label>
                <input type="radio" name="rating" id="rating-2" value="2"/>
                <label for="rating-2" class="fa fa-star"></label>
                <input type="radio" name="rating" id="rating-3" value="3"/>
                <label for="rating-3" class="fa fa-star"></label>
                <input type="radio" name="rating" id="rating-4" value="4"/>
                <label for="rating-4" class="fa fa-star"></label>
                <input type="radio" name="rating" id="rating-5" value="5"/>
                <label for="rating-5" class="fa fa-star"></label>
              </div>
              <div class="clearfix"></div>
            </div>            
          </div>
          <form id="utf_add_comment" class="utf_add_comment">
            <fieldset>
              <div class="row">
                <div class="col-md-4">
                  <label>Name:</label>
                  <input type="text" placeholder="Name" value=""/>
                </div>
                <div class="col-md-4">
                  <label>Email:</label>
                  <input type="text" placeholder="Email" value=""/>
                </div>
                <div class="col-md-4">
                  <label>Subject:</label>
                  <input type="text" placeholder="Subject" value=""/>
                </div>
              </div>
              <div>
                <label>Review:</label>
                <textarea cols="40" placeholder="Your Message..." rows="3"></textarea>
              </div>
            </fieldset>
            <button class="button">Submit Review</button>
            <div class="clearfix"></div>
          </form>
        </div>
      </div>
      
      <!-- Sidebar -->
      <div class="col-lg-4 col-md-4 margin-top-75 sidebar-search">
        <div class="verified-badge with-tip margin-bottom-30" data-tip-content="Listing has been verified and belongs business owner or manager."> <i class="sl sl-icon-check"></i> Now Available</div>
        <div class="utf_box_widget booking_widget_box">
          <h3><i class="fa fa-calendar"></i> Booking
			<div class="price">
				<span>185$<small>person</small></span>				
			</div>
		  </h3>
          <div class="row with-forms margin-top-0">
            <div class="col-lg-12 col-md-12 select_date_box">
              <input type="text" id="date-picker" placeholder="Select Date" readonly="readonly">
			  <i class="fa fa-calendar"></i>
            </div>
  		    <div class="col-lg-12">
				<div class="panel-dropdown time-slots-dropdown">
					<a href="#">Choose Time Slot...</a>
					<div class="panel-dropdown-content padding-reset">
						<div class="panel-dropdown-scrollable">
							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-1">
								<label for="time-slot-1">
									<strong><span>1</span> : 8:00 AM - 8:30 AM</strong>									
								</label>
							</div>
							
							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-2">
								<label for="time-slot-2">
									<strong><span>2</span> : 8:30 AM - 9:00 AM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-3">
								<label for="time-slot-3">
									<strong><span>3</span> : 9:00 AM - 9:30 AM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-4">
								<label for="time-slot-4">
									<strong><span>4</span> : 9:30 AM - 10:00 AM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-5">
								<label for="time-slot-5">
									<strong><span>5</span> : 10:00 AM - 10:30 AM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-6">
								<label for="time-slot-6">
									<strong><span>6</span> : 13:00 PM - 13:30 PM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-7">
								<label for="time-slot-7">
									<strong><span>7</span> : 13:30 PM - 14:00 PM</strong>
								</label>
							</div>

							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-8">
								<label for="time-slot-8">
									<strong><span>8</span> : 14:00 PM - 14:30 PM</strong>
								</label>
							</div>
							
							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-9">
								<label for="time-slot-9">
									<strong><span>9</span> : 15:00 PM - 15:30 PM</strong>
								</label>
							</div>
							
							<div class="time-slot">
								<input type="radio" name="time-slot" id="time-slot-10">
								<label for="time-slot-10">
									<strong><span>10</span> : 16:00 PM - 16:30 PM</strong>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="panel-dropdown">
					<a href="#">Guests <span class="qtyTotal" name="qtyTotal">1</span></a>
					<div class="panel-dropdown-content">
						<div class="qtyButtons">
							<div class="qtyTitle">Adults</div>
							<input type="text" name="qtyInput" value="1">
						</div>
						<div class="qtyButtons">
							<div class="qtyTitle">Childrens</div>
							<input type="text" name="qtyInput" value="1">
						</div>
					</div>
				</div>
			</div>
			<div class="with-forms margin-top-0">
				<div class="col-lg-12 col-md-12">
					<select class="utf_chosen_select_single" >
					  <option label="Select Time">Select Time</option>
					  <option>Lunch</option>
					  <option>Dinner</option>					  
					</select>
				</div>
			</div>	
          </div>          
		  <a <a href="listing_booking.html" class="utf_progress_button button fullwidth_block margin-top-5">Request Booking</a>
		  <button class="like-button add_to_wishlist"><span class="like-icon"></span> Add to Wishlist</button>
          <div class="clearfix"></div>
        </div>
        <div class="utf_box_widget margin-top-35">
          <h3><i class="sl sl-icon-phone"></i> Contact Info</h3>
          <div class="utf_hosted_by_user_title"> <a href="#" class="utf_hosted_by_avatar_listing"><img src="/images/dashboard-avatar.jpg" alt=""></a>
            <h4><a href="#">Kathy Brown</a><span>Posted 3 Days Ago</span>
              <span>Lonsdale St, Melbourne <i class="sl sl-icon-location"></i></span>
            </h4>
          </div>
		  <ul class="utf_social_icon rounded margin-top-10">
            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
            <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
            <li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>            
          </ul>
          <ul class="utf_listing_detail_sidebar">
            <li><i class="sl sl-icon-map"></i> 12345 Little Lonsdale St, Melbourne</li>
            <li><i class="sl sl-icon-phone"></i> +(012) 1123-254-456</li>
            <li><i class="sl sl-icon-globe"></i> <a href="#">www.example.com</a></li>
            <li><i class="fa fa-envelope-o"></i> <a href="mailto:info@example.com">info@example.com</a></li>
          </ul>		  
        </div>
        <div class="utf_box_widget margin-top-35">
          <h3><i class="sl sl-icon-folder-alt"></i> Categories</h3>
          <ul class="utf_listing_detail_sidebar">
            <li><i class="fa fa-angle-double-right"></i> <a href="#">Travel</a></li>
            <li><i class="fa fa-angle-double-right"></i> <a href="#">Nightlife</a></li>
            <li><i class="fa fa-angle-double-right"></i> <a href="#">Fitness</a></li>
            <li><i class="fa fa-angle-double-right"></i> <a href="#">Real Estate</a></li>
            <li><i class="fa fa-angle-double-right"></i> <a href="#">Restaurant</a></li>
            <li><i class="fa fa-angle-double-right"></i> <a href="#">Dance Floor</a></li>
          </ul>
        </div>
        <div class="utf_box_widget opening-hours margin-top-35">
          <h3><i class="sl sl-icon-clock"></i> Business Hours</h3>
          <ul>
            <li>Monday <span>09:00 AM - 09:00 PM</span></li>
            <li>Tuesday <span>09:00 AM - 09:00 PM</span></li>
            <li>Wednesday <span>09:00 AM - 09:00 PM</span></li>
            <li>Thursday <span>09:00 AM - 09:00 PM</span></li>
            <li>Friday <span>09:00 AM - 09:00 PM</span></li>
            <li>Saturday <span>09:00 AM - 10:00 PM</span></li>
            <li>Sunday <span>09:00 AM - 10:00 PM</span></li>
          </ul>
        </div>	
		<div class="opening-hours margin-top-35">
			<div class="utf_coupon_widget" style="background-image: url(/images/coupon-bg-1.jpg);">
				<div class="utf_coupon_overlay"></div>
				<a href="#" class="utf_coupon_top">
					<h3>Book Now & Get 50% Discount</h3>
					<div class="utf_coupon_expires_date">Date of Expires 05/08/2019</div>	
					<div class="utf_coupon_used"><strong>How to use?</strong> Just show us this coupon on a screen</div>	
				</a>
				<div class="utf_coupon_bottom">
					<p>Coupon Code</p>
					<div class="utf_coupon_code">DL76T</div>
				</div>
			</div>
		</div>
        <div class="utf_box_widget opening-hours margin-top-35">
          <h3><i class="sl sl-icon-info"></i> Additional Information</h3>
          <ul>
            <li>Take Out: <span>Yes</span></li>
            <li>Delivery: <span>Yes</span></li>
            <li>Neutral Restrooms: <span>Yes</span></li>
            <li>Has Pool Table: <span>Yes</span></li>
            <li>Gender Neutral Restrooms: <span>Yes</span></li>
            <li>Waiter Service: <span>Yes</span></li>
          </ul>
        </div>
		<div class="utf_box_widget opening-hours margin-top-35">
          <h3><i class="sl sl-icon-envelope-open"></i> Sidebar Form</h3>
          <form id="contactform">
            <div class="row">              
              <div class="col-md-12">                
                  <input name="name" type="text" placeholder="Name" required="">                
              </div>
              <div class="col-md-12">                
                  <input name="email" type="email" placeholder="Email" required="">                
              </div>    
			  <div class="col-md-12">                
                  <input name="phone" type="text" placeholder="Phone" required="">                
              </div>	
			  <div class="col-md-12">
				  <textarea name="comments" cols="40" rows="2" id="comments" placeholder="Your Message" required=""></textarea>
			  </div>
            </div>            
            <input type="submit" class="submit button" id="submit" value="Contact Agent">
          </form>
        </div>
		<div class="utf_box_widget opening-hours margin-top-35">
          <h3><i class="sl sl-icon-info"></i> Google AdSense</h3>
          <span><img src="/images/google_adsense.jpg" alt="" /></span>
        </div>
        <div class="utf_box_widget margin-top-35">
          <h3><i class="sl sl-icon-phone"></i> Quick Contact to Help?</h3>
          <p>Excepteur sint occaecat non proident, sunt in culpa officia deserunt mollit anim id est laborum.</p>
          <ul class="utf_social_icon rounded">
            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
            <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
            <li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>            
          </ul>
          <a class="utf_progress_button button fullwidth_block margin-top-5" href="contact.html">Contact Us</a> 
		</div>
        <div class="utf_box_widget listing-share margin-top-35 margin-bottom-40 no-border">
          <h3><i class="sl sl-icon-pin"></i> Bookmark Listing</h3>
		  <span>1275 People Bookmarked Listings</span>
          <button class="like-button"><span class="like-icon"></span> Login to Bookmark Listing</button>          
          <ul class="utf_social_icon rounded margin-top-35">
            <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
            <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
            <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
            <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
            <li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>            
          </ul>
          <div class="clearfix"></div>
        </div>
		<div class="utf_box_widget opening-hours review-avg-wrapper margin-top-35">
          <h3><i class="sl sl-icon-star"></i>  Rating Average </h3>
          <div class="box-inner">
			  <div class="rating-avg-wrapper text-theme clearfix">
				<div class="rating-avg">4.8</div>
				<div class="rating-after">
				  <div class="rating-mode">/5 Average</div>
				  
				</div>
			  </div>
			  <div class="ratings-avg-wrapper">
				<div class="ratings-avg-item">
				  <div class="rating-label">Quality</div>
				  <div class="rating-value text-theme">5.0</div>
				</div>
				<div class="ratings-avg-item">
				  <div class="rating-label">Location</div>
				  <div class="rating-value text-theme">4.5</div>
				</div>
				<div class="ratings-avg-item">
				  <div class="rating-label">Space</div>
				  <div class="rating-value text-theme">3.5</div>
				</div>
				<div class="ratings-avg-item">
				  <div class="rating-label">Service</div>
				  <div class="rating-value text-theme">4.0</div>
				</div>
				<div class="ratings-avg-item">
				  <div class="rating-label">Price</div>
				  <div class="rating-value text-theme">5.0</div>
				</div>
			  </div>
			</div>
        </div>
      </div>
    </div>
  </div>
  
  <section class="fullwidth_block padding-top-20 padding-bottom-50">
    <div class="container">
      <div class="row slick_carousel_slider">
        <div class="col-md-12">
          <h3 class="headline_part centered margin-bottom-25">Similar Listings</h3>
        </div>		
		<div class="row">
			<div class="col-md-12">
				<div class="simple_slick_carousel_block utf_dots_nav"> 
				  <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
					<div class="utf_listing_item"> <img src="/images/utf_listing_item-01.jpg" alt=""> <span class="tag"><i class="im im-icon-Chef-Hat"></i> Restaurant</span> <span class="featured_tag">Featured</span>
					  <span class="utf_open_now">Open Now</span>
					  <div class="utf_listing_item_content">
					    <div class="utf_listing_prige_block">							
							<span class="utf_meta_listing_price"><i class="fa fa-tag"></i> $25 - $55</span>							
							<span class="utp_approve_item"><i class="utf_approve_listing"></i></span>
						</div>
						<h3>Chontaduro Barcelona</h3>
						<span><i class="sl sl-icon-location"></i> The Ritz-Carlton, Hong Kong</span>
						<span><i class="sl sl-icon-phone"></i> (415) 796-3633</span>											
					  </div>					  
					</div>
					<div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div>
					</a> 
				  </div>
				  
				  <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
					<div class="utf_listing_item"> <img src="/images/utf_listing_item-02.jpg" alt=""> <span class="tag"><i class="im im-icon-Electric-Guitar"></i> Events</span>
					  <div class="utf_listing_item_content">
					    <div class="utf_listing_prige_block">							
							<span class="utf_meta_listing_price"><i class="fa fa-tag"></i> $45 - $70</span>							
						</div>
						<h3>The Lounge & Bar</h3>
						<span><i class="sl sl-icon-location"></i> The Ritz-Carlton, Hong Kong</span>
						<span><i class="sl sl-icon-phone"></i> (415) 796-3633</span>												
					  </div>
					</div>
					<div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div>
					</a> 
				  </div>
				  
				  <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
					<div class="utf_listing_item"> <img src="/images/utf_listing_item-03.jpg" alt=""> <span class="tag"><i class="im im-icon-Hotel"></i> Hotels</span>
					  <span class="utf_closed">Closed</span>
					  <div class="utf_listing_item_content">
					    <div class="utf_listing_prige_block">							
							<span class="utf_meta_listing_price"><i class="fa fa-tag"></i> $25 - $55</span>							
						</div>
						<h3>Westfield Sydney</h3>
						<span><i class="sl sl-icon-location"></i> The Ritz-Carlton, Hong Kong</span>
						<span><i class="sl sl-icon-phone"></i> (415) 796-3633</span>												
					  </div>
					</div>
					<div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div>
					</a> 
				  </div>
				  
				  <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
					<div class="utf_listing_item"> <img src="/images/utf_listing_item-04.jpg" alt=""> <span class="tag"><i class="im im-icon-Dumbbell"></i> Fitness</span>
					  <div class="utf_listing_item_content">
					    <div class="utf_listing_prige_block">							
							<span class="utf_meta_listing_price"><i class="fa fa-tag"></i> $45 - $70</span>							
							<span class="utp_approve_item"><i class="utf_approve_listing"></i></span>
						</div>
						<h3>Ruby Beauty Center</h3>
						<span><i class="sl sl-icon-location"></i> The Ritz-Carlton, Hong Kong</span>
						<span><i class="sl sl-icon-phone"></i> (415) 796-3633</span>												
					  </div>
					</div>
					<div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div>
					</a> 
				  </div>
				  
				  <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
					<div class="utf_listing_item"> <img src="/images/utf_listing_item-05.jpg" alt=""> <span class="tag"><i class="im im-icon-Hotel"></i> Hotels</span> <span class="featured_tag">Featured</span>
					  <span class="utf_closed">Closed</span>
					  <div class="utf_listing_item_content">
					    <div class="utf_listing_prige_block">							
							<span class="utf_meta_listing_price"><i class="fa fa-tag"></i> $45 - $70</span>							
						</div>
						<h3>UK Fitness Club</h3>
						<span><i class="sl sl-icon-location"></i> The Ritz-Carlton, Hong Kong</span>
						<span><i class="sl sl-icon-phone"></i> (415) 796-3633</span>												
					  </div>
					</div>
					<div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div>
					</a> 
				   </div>
				  
				  <div class="utf_carousel_item"> <a href="listings_single_page_1.html" class="utf_listing_item-container compact">
					<div class="utf_listing_item"> <img src="/images/utf_listing_item-06.jpg" alt=""> <span class="tag"><i class="im im-icon-Chef-Hat"></i> Restaurant</span>
					  <span class="utf_open_now">Open Now</span>
					  <div class="utf_listing_item_content">
					    <div class="utf_listing_prige_block">							
							<span class="utf_meta_listing_price"><i class="fa fa-tag"></i> $25 - $45</span>							
							<span class="utp_approve_item"><i class="utf_approve_listing"></i></span>
						</div>
						<h3>Fairmont Pacific Rim</h3>
						<span><i class="sl sl-icon-location"></i> The Ritz-Carlton, Hong Kong</span>
						<span><i class="sl sl-icon-phone"></i> (415) 796-3633</span>											
					  </div>
					</div>
					<div class="utf_star_rating_section" data-rating="4.5">
						<div class="utf_counter_star_rating">(4.5)</div>
						<span class="utf_view_count"><i class="fa fa-eye"></i> 822+</span>
						<span class="like-icon"></span>
					</div>
					</a>
				  </div>
				</div>
			  </div>
		  </div>
	   </div>
    </div>
  </section>
  
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

@endsection


@section('scripts')
<!-- Maps --> 
<script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script> 

<script src="{{ asset('js/layout/infobox.min.js') }}"></script>
<script src="{{ asset('js/layout/markerclusterer.js') }}"></script>
<script src="{{ asset('js/layout/maps.js') }}"></script>
<script src="{{ asset('js/layout/quantityButtons.js') }}"></script>
<script src="{{ asset('js/layout/moment.min.js') }}"></script>
<script src="{{ asset('js/layout/daterangepicker.js') }}"></script>

<script>
$(function() {
	$('#date-picker').daterangepicker({
		"opens": "left",
		singleDatePicker: true,
		isInvalidDate: function(date) {
		var disabled_start = moment('09/02/2018', 'MM/DD/YYYY');
		var disabled_end = moment('09/06/2018', 'MM/DD/YYYY');
		return date.isAfter(disabled_start) && date.isBefore(disabled_end);
		}
	});
});

$('#date-picker').on('showCalendar.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-animated');
});
$('#date-picker').on('show.daterangepicker', function(ev, picker) {
	$('.daterangepicker').addClass('calendar-visible');
	$('.daterangepicker').removeClass('calendar-hidden');
});
$('#date-picker').on('hide.daterangepicker', function(ev, picker) {
	$('.daterangepicker').removeClass('calendar-visible');
	$('.daterangepicker').addClass('calendar-hidden');
});

function close_panel_dropdown() {
$('.panel-dropdown').removeClass("active");
	$('.fs-inner-container.content').removeClass("faded-out");
}
$('.panel-dropdown a').on('click', function(e) {
	if ($(this).parent().is(".active")) {
		close_panel_dropdown();
	} else {
		close_panel_dropdown();
		$(this).parent().addClass('active');
		$('.fs-inner-container.content').addClass("faded-out");
	}
	e.preventDefault();
});
$('.panel-buttons button').on('click', function(e) {
	$('.panel-dropdown').removeClass('active');
	$('.fs-inner-container.content').removeClass("faded-out");
});
var mouse_is_inside = false;
$('.panel-dropdown').hover(function() {
	mouse_is_inside = true;
}, function() {
	mouse_is_inside = false;
});
$("body").mouseup(function() {
	if (!mouse_is_inside) close_panel_dropdown();
});
</script>
@endsection