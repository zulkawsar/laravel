@extends('layouts.master')

@section('content')
	<div class="col-sm-8">
		<div id="blog-post_{{ $post->id }}">
		  <h4 class="blog-post-title">
		  	{{ $post->title }}

		  </h4>
		  <p class="blog-post-meta">
		  	{{ $post->user->name }} {{ $post->created_at->toFormattedDateString() }}
		  	<button class="fas fa-pencil-alt" name="edit" onclick="editpost(this, {{$post->id}})" style="border: none; background: transparent;"></button>
		  </p>

		  <p class="message-body">{{ $post->body }}</p>
		  
		</div><!-- /.blog-post -->

		<div class="media bg-light comment">
			<img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded-circle" style="width: 40px; height: 40px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1619e710049%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1619e710049%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2212.166666746139526%22%20y%3D%2216.999999976158144%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
			<div class="media-body">
				<form method="POST" action="{{ route('comment', $post->id) }}" >
					{{ csrf_field() }}
					<div class="form-group position-relative {{ $errors->has('comment') ? 'has error': '' }}">
						<input class="form-control" name="comment" placeholder="Write your comment"/>
						
						@if ($errors->has('comment'))
						    <span class="help-block">
						        <strong>{{ $errors->first('comment') }}</strong>
						    </span>
						@endif

						<button type="submit" class="text-right"><i class="far fa-paper-plane "></i></button>
						
					</div>
				</form>
			</div>
		</div>
		
		{{-- All Comment --}}
		<div class="my-3 p-3 rounded box-shadow bg-white">
			<h6 class="border-bottom border-gray pb-1 mb-0 text-muted"> Recent Comments </h6>
			@if(!empty($post->Comments))
				@foreach($post->Comments as $comment)
						<div class="media text-muted mt-3">
							<img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded-circle" style="width: 32px; height: 32px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1619e710049%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1619e710049%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2212.166666746139526%22%20y%3D%2216.999999976158144%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
							<div class="media-body">
						    	<div class="p-0 mb-4">
						    		<div class="border-bottom border-gray w-100 pb-1">
						    			<strong class="pr-3">{{ $comment->userComment->name }}</strong>
						    			<small>  on {{ $comment->created_at->diffForHumans() }}</small>
						    		</div>
						    		<p class="text-justify small pb-1 mt-2">
						    			{{ $comment->comment }}
						    		</p>
					    			<span class="pt-2 ">
					    				<i class="fa fa-thumbs-up"><span class="badge text-info">3</span></i>
					    				<i class="fa fa-thumbs-down"><span class="badge text-info">3</span></i>
					    				<i class="fa fa-reply-all reply" data-toggle="collapse" data-target="#collapseExample1{{ $comment->id }}" aria-expanded="false"><span class="badge text-info">3</span></i>
					    			</span>
						    	</div>

						    	{{-- replay Comments --}}
						    	<div class="all-reply collapse" id="collapseExample1{{ $comment->id }}">
							    	<div class="media comment">
							    		<img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded-circle" style="width: 40px; height: 40px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1619e710049%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1619e710049%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2212.166666746139526%22%20y%3D%2216.999999976158144%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
							    		<div class="media-body">
							    			<form method="POST" action="{{ route('reply', $comment->id)  }}">
							    				{{ csrf_field() }}
							    				<div class="form-group position-relative {{ $errors->has('reply') ? 'has error': '' }}">
							    					<input class="form-control" name="reply" placeholder="Write your comment"/>
							    					
							    					@if ($errors->has('title'))
							    					    <span class="help-block">
							    					        <strong>{{ $errors->first('reply') }}</strong>
							    					    </span>
							    					@endif

							    					<button type="submit" class="text-right"><i class="far fa-paper-plane"></i></button>
							    					
							    				</div>
							    			</form>
							    		</div>
							    	</div>

							    	{{-- Replay --}}
							    	@if(!empty($comment->Reply))
							    		@foreach($comment->Reply as $reply)
							    			
			    					    	<div class="media mt-3">
			    			    				<img data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class="mr-2 rounded-circle" style="width: 32px; height: 32px;" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%2232%22%20height%3D%2232%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2032%2032%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1619e710049%20text%20%7B%20fill%3A%23007bff%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A2pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1619e710049%22%3E%3Crect%20width%3D%2232%22%20height%3D%2232%22%20fill%3D%22%23007bff%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2212.166666746139526%22%20y%3D%2216.999999976158144%22%3E32x32%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true">
			    			    				<div class="media-body">
			    			    			    	<div class="p-0 mb-4">
			    			    			    		<div class="border-bottom border-gray w-100 pb-1">
			    			    			    			<strong class="pr-3">{{ $reply->replyUser->name }}</strong>
			    			    			    			<small>{{ $reply->created_at->diffForHumans() }}</small>
			    			    			    		</div>
			    			    			    		<p class="text-justify small pb-1 mt-2">
			    			    			    			{{ $reply->reply }}
			    			    			    		</p>
			    			    		    			<span class="pt-2 ">
			    			    		    				<i class="far fa-thumbs-up"><span class="badge text-info">3</span></i>
			    			    		    				<i class="far fa-thumbs-up"><span class="badge text-info">3</span></i>
			    			    		    				<i class="far fa-thumbs-up"><span class="badge text-info">3</span></i>
			    			    		    			</span>
			    			    			    	</div>
			    			    			    </div>
			    					    	</div>
							    		@endforeach
							    	@endif
							    	
						    	</div> <!-- /reply Comment -->

							</div>
						</div>
						
				@endforeach	
			@endif
		</div>
		
	</div>
	@php 
		$link = route('index');
		$actionLink = $link.'/?';
	@endphp
@endsection
@section('extraJS')
<script type="text/javascript">

	function editpost(editobj,id){
		$(editobj).prop('disable','true');
		var currentMes = $("#blog-post_"+ id + " .message-body").html();

		var editMarkUp = '<textarea row="2" cols="50" id="txtmessage_'+id+'">'+ currentMes +' </textarea> </br> <button class="btn btn-info" name="edit-save" onclick="ajaxCRUD(\'edit\','+id+')">save </button>';
		$("#blog-post_" + id + " .message-body").html(editMarkUp);
		
	}

	function ajaxCRUD(action,id){
		
		var ulrLink = '{{$actionLink}}';
		var totalink = ulrLink + action + "=" + "&id="+id + '&body=' + $("#txtmessage_"+id).val();
		alert(totalink);
		
	}
</script>
@endsection