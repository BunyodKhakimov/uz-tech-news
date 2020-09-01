@extends('layouts.main')

@section('title', 'Home')

@section('miniposts')
<section>
	<div class="mini-posts">
		@foreach($most_liked_posts as $post)
			<article class="mini-post">
				<header>
					<h3><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h3>
					<time class="published" datetime="2015-10-20">
						{{ date('F j, Y', strtotime($post->created_at))}}
					</time>
					<a href="#" class="author"><img src="{{ asset('images/profile.png') }}" alt="" /></a>
				</header>
				<a href="{{ route('posts.show', $post->id) }}" class="image"><img src="{{ asset('images/pic13.jpg') }}" alt="" /></a>
			</article>
		@endforeach
	</div>
</section>
@endsection

@section('postlist')
<section>
	<ul class="posts">
		@foreach($most_viewed_posts as $post)
		<li>
			<article>
				<header>
					<h3>
						<a href="{{ route('posts.show', $post->id) }}">
							{{ $post->title }}
						</a>
					</h3>
					<time class="published" datetime="2015-10-20">
						{{ date('F j, Y', strtotime($post->created_at))}}
					</time>
				</header>
				<a href="{{ route('posts.show', $post->id) }}" class="image img-container">
					<img src="{{ asset('images/pic18.jpg') }}" alt="" />
				</a>
			</article>
		</li>
		@endforeach
	</ul>
</section>
@endsection

@section('content')
<!-- Posts -->
@foreach($posts as $post)
<article class="post">
	<header>
		<div class="title">
			<h2>
				<a href="{{ route('getSinglePost', $post->id) }}">
					{{ $post->title }}
				</a>
			</h2>
			<p>{{ $post->subtitle }}</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-10-18">
			{{ date('F j, Y', strtotime($post->created_at))}}
			</time>
			<a href="#" class="author"><span class="name">{{ $post->author }}</span><img src="{{ asset('images/profile.png') }}" alt="" /></a>
		</div>
	</header>
	<a href="{{ route('posts.show', $post->id) }}" class="image featured">
		<img src="{{ asset('images/pic14.jpg') }}" alt="" />
	</a>
	<p>
		{{ substr($post->body, 0, 350) }}
		{{ strlen($post->body)>350 ? "..." : "" }}
	</p>
	<footer>
		<ul class="actions">
			<li><a href="{{ route('getSinglePost', $post->id) }}" class="button big">Continue Reading</a></li>
		</ul>
		<ul class="stats">
			<li><a href="#">{{ $post->category }}</a></li>
			<li><a href="#" class="icon fa-heart">{{ $post->likes }}</a></li>
			<li><a href="#" class="icon fa-comment">{{ $post->views }}</a></li>
		</ul>
	</footer>
</article>
@endforeach
<!-- Pagination -->
{{ $posts->links() }}
@endsection