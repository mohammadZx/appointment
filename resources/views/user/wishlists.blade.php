@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
    <div class="utf_dashboard_content">

      
      <div class="row"> 
        <div class="col-lg-12 col-md-12">
          <div class="utf_dashboard_list_box with-icons margin-top-20">
            <h4>{{__('app.Wishlists')}}</h4>
            <ul>
              @foreach($wishlists as $wishlist)
              @php $listing = $wishlist->wishlistable @endphp
              <li> 
                <i class="utf_list_box_icon {{$listing->service->icon}}"></i> <a href="{{route('listing.show', $listing->id)}}">{{$listing->name}}</a> <strong><a href="#">{{$listing->service->title}}</a></strong></a> 
                <form class="close-list-item" action="{{route('user.wishlist.destroy', $wishlist->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="close-list-item"><i class="fa fa-close"></i></button>  
                </form>
            </li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $wishlists])
		  </div>
        <div class="col-md-12">
          <div class="footer_copyright_part">{{__('app.Copyright')}}</div>
        </div>
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