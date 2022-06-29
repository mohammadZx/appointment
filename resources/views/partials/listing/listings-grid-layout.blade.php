@foreach($listings as $listing)

    <div class="@if(isset($slide) && $slide = true) utf_carousel_item @endif"> <a href="{{route('listing.show', $listing->id)}}" class="utf_listing_item-container compact">
        <div class="utf_listing_item"> <img src="{{get_image($listing->getMeta('thumbnail_id', true))}}" alt=""> <span class="tag">{{$listing->service->title}} <i class="{{$listing->service->category->icon}}"></i></span>
            <div class="utf_listing_item_content">
            <div class="utf_listing_prige_block">							
                <span class="utf_meta_listing_price"><i class="fa fa-tag"></i> $45 - $70</span>							
            </div>
            <h3>{{$listing->name}}</h3>
            <span><i class="sl sl-icon-location"></i> {{$listing->address}}</span>
            <span><i class="sl sl-icon-phone"></i> {{$listing->user->phone}}</span>												
            </div>
        </div>
        </a> 
    </div>
 
@endforeach