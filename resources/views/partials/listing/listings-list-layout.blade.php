@foreach($listings as $listing)
<div class="@isset($col) col-lg-{{$col}} col-md-$col @else col-lg-12 col-md-12 @endif">
    <div class="utf_listing_item-container list-layout"> <a href="{{route('listing.show', $listing->id)}}" class="utf_listing_item">
        <div class="utf_listing_item-image"> 
        <img src="{{get_image($listing->getMeta('thumbnail_id', true))}}" alt=""> 
        <span class="tag">{{$listing->service->title}} <i class="{{$listing->service->category->icon}}"></i></span> 

        </div>
        <div class="utf_listing_item_content">
        <div class="utf_listing_item-inner">
            <h3>{{$listing->name}}</h3>
            <span><i class="sl sl-icon-location"></i> {{$listing->address}}</span>
            <span><i class="sl sl-icon-phone"></i> {{$listing->user->phone}}</span>
            <p>{{Str::words($listing->content, 10, '...')}}</p>
        </div>
        </div>
        </a> 
    </div>
</div>
@endforeach