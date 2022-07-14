<ul>
    @foreach($listings as $listing)
    <li>
    <div class="utf_list_box_listing_item">
        <div class="utf_list_box_listing_item-img"><a href="{{route('listing.show', $listing->id)}}"><img src="{{get_image($listing->getMeta('thumbnail_id', true))}}" alt=""></a></div>
        <div class="utf_list_box_listing_item_content">
        <div class="inner">
            <h3>{{$listing->name}}</h3>
            <span><i class="{{$listing->service->category->icon}}"></i> {{$listing->service->title}}</span> 
            <span><i class="sl sl-icon-location"></i> {{$listing->address}}</span>
            <span><i class="sl sl-icon-phone"></i> {{$listing->user->phone}}</span>
            <p>{{Str::words($listing->content, 10, '...')}}</p>
        </div>
        <span class="status status-{{$listing->status}}">{{__('app.listingStatus' . $listing->status)}}
            @if($listing->getMeta('message', true))
            : {{$listing->getMeta('message', true)}}
            @endif
        </span>
        </div>
    </div>
    <div class="buttons-to-right"> 
        <a href="{{route('user.listing.edit', $listing->id)}}" class="button gray"><i class="fa fa-pencil"></i> {{__('app.Edit')}}</a> 
        <form action="{{route('user.listing.destroy', $listing->id)}}" method="post">
            @csrf @method('delete')
            <button class="button gray"><i class="fa fa-trash-o"></i> {{__('app.Delete')}}</button>
        </form>
    </div>
    </li>
    @endforeach
</ul>