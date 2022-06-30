<div class="col-lg-12 col-md-12">
    @isset($withFilters)
        <div class="listing_filter_block">
          <form action="{{route('listing.index')}}" class="col-md-12 filter-row">
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