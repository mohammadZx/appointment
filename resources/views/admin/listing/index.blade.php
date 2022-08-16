@extends('layouts.app')
@section('seo_title', get_title(__('app.Listings')))

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
   
    <div class="utf_dashboard_content"> 
  @include('partials.global.filter', ['filters' => ['status', 'city', 'service','search'] , 'route' => route('admin.listing.index')])

      <div class="row"> 
        <div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box margin-top-0">
        <ul class="admin user-listings">
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

                @can('change_listing_status')
                <form action="{{route('admin.listing.changestatus', $listing->id)}}" method="post">
                    @csrf
                    <div class="row">
                    <select class="col-md-6 padding-0" name="status" required id="">
                        <option value="">{{__("app.Select Status")}}</option>
                        <option value="1">{{__("app.Status Approved")}}</option>
                        <option value="2">{{__("app.Status Declined")}}</option>
                        <option value="0">{{__("app.Status None")}}</option>
                    </select>
                    <div class="col-md-6">
                    <input  type="text" name="message" placeholder="{{__('app.Message')}}">
                    </div>
                    </div>
                    <button class="button gray col-md-12"><i class="fa fa-pencil"></i> {{__('app.Chage Status')}}</button>
            
                </form>
                @endcan

                </div>
            </div>
            <div class="buttons-to-right">
                @can('edit_listing') 
                <a href="{{route('admin.listing.edit', $listing->id)}}" class="button gray"><i class="fa fa-pencil"></i> {{__('app.Edit')}}</a> 
                @endcan

                @can('delete_listing')
                <form action="{{route('admin.listing.destroy', $listing->id)}}" method="post">
                    @csrf @method('delete')
                    <button class="button gray"><i class="fa fa-trash-o"></i> {{__('app.Delete')}}</button>
                </form>
                @endcan
            </div>
            </li>
            @endforeach
        </ul> 
          </div>
        </div>
        <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $listings])
		  </div>
        <div class="col-md-12">
          <div class="footer_copyright_part">{{__('app.Copyright')}}</div>
        </div>
      </div>
    </div>
  </div>

@endsection


@section('scripts')
<script>
(function($) {
try {
	var jscr1 = $('.js-scrollbar');
	if (jscr1[0]) {
		const ps1 = new PerfectScrollbar('.js-scrollbar');

	}
    } catch (error) {
        console.log(error);
    }
})(jQuery);
</script>

@endsection