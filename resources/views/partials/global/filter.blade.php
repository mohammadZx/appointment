@if(isset($filters) && count($filters) > 0)
<div class="listing-filter">
    <div class="listing_filter_block">
    <form action="{{$route}}" class="col-md-12 filter-row">
        @if(in_array('aptstatus', $filters))
            <div class="sort-by w-30 px-1">
                <select name="aptstatus" id="">
                    <option value="">{{__("app.Select Status")}}</option>
                    @foreach($cases as $case)
                    <option value="{{$case->value}}">{{__('app.'. $case->value)}}</option>
                    @endforeach
                </select>
            </div>
        @endif
        @if(in_array('search', $filters))
        <div class="sort-by w-30 px-1">
            <div class="utf_sort_by_select_item sort_by_margin">
                <input type="text" name="name" placeholder="{{__('app.Enter listing name')}}" value="">
            </div>
        </div>
        @endif
        @if(in_array('city', $filters))
        <div class="sort-by w-30 px-1">
            <div class="utf_sort_by_select_item sort_by_margin">
                <select name="city" @if(request()->has('city')) value="{{request()->city}}" @endif data-placeholder="{{__('app.pages.index.City')}}" class="selectpicker with-ajax default city" title="{{__('app.pages.index.City')}}" data-live-search="true" data-selected-text-format="count" data-size="5"></select>
            </div>
        </div>
        @endif
        @if(in_array('service', $filters))
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
        @endif
        @if(in_array('status', $filters))
        <div class="sort-by w-30 px-1">
            <select name="status" id="">
                <option value="">{{__("app.Select Status")}}</option>
                <option value="1">{{__("app.Status Approved")}}</option>
                <option value="2">{{__("app.Status Declined")}}</option>
                <option value="0">{{__("app.Status None")}}</option>
            </select>
        </div>
        @endif
        @if(in_array('aptdate', $filters))
        <div class="sort-by w-30 px-1">
            <div class="utf_sort_by_select_item sort_by_margin">
                <input type="text" id="date-picker" name="date" required class="booking-date-picker" data-jdp placeholder="{{__('app.Select Date')}}" readonly="readonly">
            </div>
        </div>
        @endif
        <div class="sort-by px-1">
            <div class="col-md-12 centered_content"> <button class="button border">{{__('app.Apply')}}</button> </div>
        </div>
    </form>
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
</div>
@endif