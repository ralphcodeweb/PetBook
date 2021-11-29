@extends('layout')

@section('meta-title') {{$post->title}} @endsection
@section('meta-description') {{$post->body}} @endsection

@section('content')
<article class="post container">
	@if ($post->photos->count() === 1)
		<figure><img src="{{ asset($post->photos->first()->url) }}" alt="Foto" class="img-responsive"></figure>

		@elseif ($post->photos->count() > 1)
		@include('post.carousel')
	@endif
    <div class="content-post">
      	<header class="container-flex space-between">
	        <div class="date">
	          <span class="c-gris">{{ $post->published_at->format('M d')}}</span>
	        </div>
	        <div class="post-category">
	          	<span class="category">{{ $post->category->name }}</span>
	        </div>
      	</header>

      	<h1>{{ $post->title }}</h1>

        <div class="divider"></div>
        <div class="image-w-text">
          	{!! $post->body !!}
        </div>

        <footer class="container-flex space-between">
            @include('partials.social-links', ['description' => $post->title ])

          	<div class="tags container-flex">
            	@foreach($post->tags as $tag)
                <span class="tag c-gris">#{{ $tag->name }}</span>
                @endforeach
          	</div>
      	</footer>
      	<div class="comments">
      		<div class="divider"></div>
    		<div id="disqus_thread"></div>
    		@include('partials.disqus-script')
      	</div><!-- .comments -->
    </div>
  </article>
@endsection

@push('style')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endpush

@push('script')
<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endpush