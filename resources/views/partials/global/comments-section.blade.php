<div id="utf_listing_reviews" class="utf_listing_section">
    <h3 class="utf_listing_headline_part margin-top-75 margin-bottom-20">{{__('app.Reviews')}} <span>{{$item->comments->count()}}</span></h3>	
    <div class="comments utf_listing_reviews">
    <ul>
        @foreach($item->comments as $comments)
        @if($comments->status)
        <li>
        <div class="avatar"><img src="{{get_user_avatar($comments->user->getMeta('user_avatar', true))}}" alt="" /></div>
        <div class="utf_comment_content">
            <div class="utf_arrow_comment"></div>
            <div class="utf_star_rating_section" data-rating="5"></div>                  
            <div class="utf_by_comment">{{$comments->user->name}}<span class="date"><i class="fa fa-clock-o"></i> {{$comments->created_at}}</span> </div>
            <p>{{$comments->content}}</p>                                    
        </div>
        </li>
        @endif
        @endforeach
    </ul>
    </div>
</div>
<div id="utf_add_review" class="utf_add_review-box">
    <h3 class="utf_listing_headline_part margin-bottom-20">{{__('app.Add Your Review')}}</h3>

        
        <div class="@guest guest-none  @endguest">
            <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
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
                <div>
                <label>{{__('app.Review')}}:</label>
                <textarea cols="40" placeholder="{{__('app.Your Message...')}}" rows="3"></textarea>
                </div>
            </fieldset>
            <input type="hidden" name="type" value="{{$type}}">
            <button class="button">{{__('app.Submit Review')}}</button>
            <div class="clearfix"></div>
        </form>
        </div>
    @guest
       <div class="d-none guest-show">
        {{__('app.For add new comment login')}}
            <br>
            <a href="#dialog_signin_part" data-redirect="false" data-close="true" class="button login-button popup-with-zoom-anim">{{__('app.Login/Register')}}</a>
       </div>
    @endguest
</div>