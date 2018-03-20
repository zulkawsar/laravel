<div class="blog-post">
  <a href="{{ route('show', $post->id) }}" class="blog-post-title">
  	{{ $post->title }}
  </a>
  <p class="blog-post-meta">
  	{{ $post->user->name }} {{ $post->created_at->toFormattedDateString() }}
  </p>

  <p>{{ $post->body }}</p>
  
</div><!-- /.blog-post -->

