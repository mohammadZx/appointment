@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
   
    <div class="utf_dashboard_content"> 
        <div class="listing-filter">
            <div class="listing_filter_block">
            <form action="{{route('admin.listing.index')}}" class="col-md-12 filter-row">
                <div class="sort-by w-30">
                <div class="utf_sort_by_select_item sort_by_margin">
                    <select name="city" @if(request()->has('city')) value="{{request()->city}}" @endif data-placeholder="{{__('app.pages.index.City')}}" class="selectpicker with-ajax default city" title="{{__('app.pages.index.City')}}" data-live-search="true" data-selected-text-format="count" data-size="5"></select>
                </div>
                </div>

                <div class="sort-by w-30 px-1">
                <div class="utf_sort_by_select_item sort_by_margin">
                    <select name="service" @if(request()->has('service')) value="{{request()->service}}" @endif data-placeholder="{{__('app.pages.index.All category')}}" class="selectpicker default category" title="{{__('app.pages.index.All category')}}" data-live-search="true" data-selected-text-format="count" data-size="5">
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
                <div class="sort-by w-30 px-1">
                    <select name="status" id="">
                        <option value="">{{__("app.Select Status")}}</option>
                        <option value="1">{{__("app.Status Approved")}}</option>
                        <option value="2">{{__("app.Status Declined")}}</option>
                        <option value="0">{{__("app.Status None")}}</option>
                    </select>
                </div>
                <div class="sort-by px-1">
                    <div class="col-md-12 centered_content"> <button class="button border">{{__('app.Apply')}}</button> </div>
                </div>
            </form>
                @php $filters = []; @endphp
                @if(request()->hasAny(FILTERS))
                    <div class="filtered col-md-12 mt-3">
                        فیلتر برای: 
                        @foreach(FILTERS as $filter)
                            @if(in_array($filter, array_keys(request()->all())) && request()->all()[$filter])
                                @php $filters[] = __('app.'. $filter) @endphp
                            @endif
                        @endforeach

                        {{implode(' و ', $filters)}}
                    </div>
                @endif
            </div>
        </div>
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box margin-top-0">
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
@include('partials.assets.city-ajax')
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