@extends('layouts.main')
@section('content')
<!-- Posts -->
@foreach($posts as $post)
<article class="post">
	<header>
		<div class="title">
			<h2><a href="#">{{ $post->title }}</a></h2>
			<p>{{ $post->subtitle }}</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-10-18">
			{{ date('F j, Y', strtotime($post->created_at))}}
			</time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/avatar.jpg') }}" alt="" /></a>
		</div>
	</header>
	<a href="{{ route('posts.show', $post->id) }}" class="image featured">
		<img src="{{ asset('images/pic01.jpg') }}" alt="" />
	</a>
	<p>
		{{ substr($post->body, 0, 350) }}
		{{ strlen($post->body)>350 ? "..." : "" }}
	</p>
	<footer>
		<ul class="actions">
			<li><a href="{{ route('posts.show', $post->id) }}" class="button big">Continue Reading</a></li>
		</ul>
		<ul class="stats">
			<li><a href="#">{{ $post->category }}</a></li>
			<li><a href="#" class="icon fa-heart">28</a></li>
			<li><a href="#" class="icon fa-comment">128</a></li>
		</ul>
	</footer>
</article>
@endforeach
<!-- Pagination -->
{{ $posts->links() }}
@endsection