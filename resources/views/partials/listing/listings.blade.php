<div class="col-lg-12 col-md-12">
    @isset($withFilters)
        <div class="listing_filter_block">
        <a href="#dialog_search_part" class="button popup-with-zoom-anim margin-right-10">{{__('app.Filter')}} <i class="im im-icon-Filter-2"></i></a>
            @php $filters = []; @endphp
            @if(request()->hasAny(array_keys(FILTERS)))
                <div class="filtered col-md-12 mt-3">
                    فیلتر برای: 
                    @foreach(FILTERS as $filter => $val)
                        @if(in_array($filter, array_keys(request()->all())) && request()->all()[$filter])
                            @php $filters[] = __('app.'. $filter) . ': ' . $val() @endphp
                        @endif
                    @endforeach

                    {{implode(' و ', $filters)}}
                </div>
            @endif
        </div>
    
    @endisset
        <div class="row">
            @include('partials.listing.listings-list-layout', ['listings' => $listings, 'col' => 6])
        </div>
        <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12">
            <div class="utf_pagination_container_part margin-top-20 margin-bottom-70">
              @include('partials.global.paginate', ['items' => $listings])
            </div>
          </div>
        </div>
      </div>