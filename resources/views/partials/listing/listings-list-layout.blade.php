@foreach($listings as $listing)
<div class="@isset($col) col-lg-{{$col}} col-md-$col @else col-lg-12 col-md-12 @endif">
    <div class="utf_listing_item-container list-layout"> <a href="{{route('listing.show', $listing->id)}}" class="utf_listing_item">
        <div class="utf_listing_item-image"> 
        <span class="like-icon @auth bookmark-button @else open-bookmark-auth @endauth @auth @php
                $userbookmarks = auth()->user()->wishlists->pluck('wishlistable_id')->contains($listing->id);
                if($userbookmarks){
                    echo 'liked';
                }
            @endphp @endauth" data-id="{{$listing->id}}"></span>
        <img src="{{get_image($listing->getMeta('thumbnail_id', true))}}" alt=""> 
        <span class="tag">{{$listing->service->title}} <i class="{{$listing->service->category->icon}}"></i></span> 

        </div>
        <div class="utf_listing_item_content">
        <div class="utf_listing_item-inner">
            <h3>{{$listing->name}}</h3>
            <span><i class="sl sl-icon-location"></i> {{$listing->address}}</span>
            <span><i class="sl sl-icon-phone"></i> {{$listing->user->phone}}</span>
            @php 
                $rate = 0;
                if($listing->comments->pluck('rate')->sum() > 0){
                    $rate = $listing->comments->pluck('rate')->sum() / $listing->comments->pluck('rate')->count();
                }
            @endphp
            @if($rate > 0)
            <div class="utf_star_rating_section" data-rating="{{$rate}}">
            <div class="utf_counter_star_rating">({{$rate}})</div>
            </div>
            @endif
            <p>{{Str::words($listing->content, 10, '...')}}</p>
        </div>
        </div>
        </a> 
    </div>
</div>
@endforeach