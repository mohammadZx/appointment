@extends('layouts.app')
@section('seo_title', get_title(__('app.Comments')))

@section('content')

    <!-- Dashboard -->
  <div id="dashboard"> 
    @include('partials.user.dashboard')   
	<div class="utf_dashboard_content">
	<div class="col-lg-12 col-md-12">
        <div class="utf_dashboard_list_box invoices province-list with-icons margin-top-20">
            <h4>{{__('app.Comment management')}}</h4>
            <ul class="admin user-comments">
              @foreach($comments as $comment)
              <li><strong>{{$comment->user->name}}</strong> <a href="{{route('listing.show', $comment->commentable->id)}}">{{$comment->commentable->name}}</a> - {{__('app.Rate')}}:{{$comment->rate}} </a>
              <p>{{$comment->content}}</p>

              @can('delete_comment')
              <form class="changestatus-appointment" action="{{route('admin.comment.destroy', $comment->id)}}" method="post">
                @csrf 
                @method('delete')    
                <button class="button margin-right-10">{{__('app.Delete')}}</button>
                
                @can('change_comment_status')
                @if(!$comment->status)
                <a href="{{route('admin.comment.changestatus', $comment->id)}}" class="button margin-right-20">{{__('app.Approve')}}</a>
                @else
                <a href="{{route('admin.comment.changestatus', $comment->id)}}" class="button margin-right-20">{{__('app.Disapprove')}}</a>
                @endif
                @endcan

                @can('edit_comment')
                 <label for="comment-edit-{{$comment->id}}" class="button"><a class="button">{{__('app.Edit')}}</a></label>
                @endcan
                </form>
            @endcan
            <br>
            <input type="checkbox" id="comment-edit-{{$comment->id}}" class="d-none edit-check" >
            <form class="edit-comment-form" action="{{route('admin.comment.update', $comment->id)}}" method="post">
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-md-12">
                        <input type="number" name="rating" min="1" max="5" placeholder="{{__('app.Rate')}}" value="{{$comment->rate}}">
                    </div>
                    <div class="col-md-12">
                    <textarea style="resize: none;" name="comment" resize="false" placeholder="{{__('app.Your Message...')}}">{{$comment->content}}</textarea>
                    </div>
                    <button class="button">{{__('app.Edit')}}</button>
                </div>
            </form>
              @endforeach
            </ul>
          </div>

		  <div class="col-md-12">
		  @include('partials.global.paginate', ['items' => $comments])
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