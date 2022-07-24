@foreach($listings as $listing)

    <div class="@if(isset($slide) && $slide = true) utf_carousel_item @endif"> <a href="{{route('listing.show', $listing->id)}}" class="utf_listing_item-container compact">
        <div class="utf_listing_item"> <img src="{{get_image($listing->getMeta('thumbnail_id', true))}}" alt=""> <span class="tag">{{$listing->service->title}} <i class="{{$listing->service->category->icon}}"></i></span>
            <div class="utf_listing_item_content">
            <div class="utf_listing_prige_block">													
            </div>
            <h3>{{$listing->name}}</h3>
            <span><i class="sl sl-icon-location"></i> {{$listing->address}}</span>
            <span><i class="sl sl-icon-phone"></i> {{$listing->user->phone}}</span>												
            </div>
        </div>
        @php 
        $rate = 5;
        if($listing->comments->pluck('rate')->sum() > 0){
            $rate = $listing->comments->pluck('rate')->sum() / $listing->comments->pluck('rate')->count();
        }
        @endphp
        <div class="utf_star_rating_section" data-rating="{{$rate}}">
            <div class="utf_counter_star_rating">({{$rate}})</div>
            <span class="like-icon @auth bookmark-button @else open-bookmark-auth @endauth @auth @php
                $userbookmarks = auth()->user()->wishlists->pluck('wishlistable_id')->contains($listing->id);
                if($userbookmarks){
                    echo 'liked';
                }
            @endphp @endauth" data-id="{{$listing->id}}"></span>
      </div>
        </a> 
    </div>
 
@endforeach