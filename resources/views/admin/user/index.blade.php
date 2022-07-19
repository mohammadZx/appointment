@extends('layouts.app')

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
    <div class="col-md-12">
      <form action="" class="filter row">
        <div class="col">
          <input type="text" value="{{request()->search}}" name="search" placeholder="{{__('app.Search')}}">
        </div>
        <div class="col">
          <button class="button">{{__('app.Set')}}</button>
        </div>
      </form>
    </div>
	<div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box invoices province-list with-icons margin-top-20">
            <h4>{{__('app.User management')}}</h4>
            <ul>
              @foreach($users as $user)
              <li><strong>{{$user->name}}</strong></a>
              <form class="changestatus-appointment" action="{{route('admin.user.destroy', $user->id)}}" method="post">
                @csrf 
                @method('delete')    
                <button class="button margin-right-10">{{__('app.Delete')}}</button>
                <a href="{{route('admin.user.edit', $user->id)}}" class="button margin-right-20">{{__('app.Edit')}}</a>
              </form> 
              @endforeach
            </ul>
          </div>

		  <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $users])
		  </div>
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