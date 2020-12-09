@extends('layouts.main')

@section('title', 'Home')


<!-- Minipost -->

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
						<a href="{{ route('author', $post->user->id) }}" class="author"><img src="{{ asset('images/profile.png') }}" alt="" /></a>
					</header>
					<a href="{{ route('posts.show', $post->id) }}" class="image">
						{{-- <img src="{{ asset('images/pic13.jpg') }}" alt="" /> --}}
						<img
							@if($post->image == null) src="{{ asset('images/pic15.jpg') }}"
							@else src="{{ asset('images/post_images/' . $post->image) }}"
							@endif
							alt="post_image" />
					</a>
				</article>
			@endforeach
		</div>
	</section>

@endsection


<!-- Postlist -->

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


<!-- Posts -->

@section('content')

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
					@foreach($post->tags as $tag)
						<span class="badge badge-secondary text-capitalize">
							{{ $tag->name }}
						</span>
					@endforeach
				</div>
				<div class="meta">
					<time class="published" datetime="2015-10-18">
					{{ date('F j, Y', strtotime($post->created_at))}}
					</time>
					<a href="{{ route('author', $post->user->id) }}" class="author">
						<span class="name">{{ $post->user->name }}</span><img src="{{ asset('images/profile.png') }}" alt="" />
					</a>
					<span class="badge badge-secondary text-capitalize">
						Admin
					</span>
				</div>
			</header>

			<a href="{{ route('posts.show', $post->id) }}" class="image featured">
				<img
					@if($post->image == null) src="{{ asset('images/pic14.jpg') }}"
					@else src="{{ asset('images/post_images/' . $post->image) }}"
					@endif
					alt="post_image" />
			</a>
			<p>
				{{ substr(strip_tags($post->body), 0, 350) }}
				{{ strlen(strip_tags($post->body))>350 ? "..." : "" }}
			</p>

			<footer>
				<ul class="actions">
					<li>
						<a href="{{ route('getSinglePost', $post->id) }}" class="button big">
							@lang('button.continue')
						</a>
					</li>
				</ul>
				<ul class="stats">
					<li>
						<a href="{{ route('category', $post->category->id) }}">{{ $post->category->name }}</a>
					</li>
					<li>
						<a href="{{ route('likePost', $post->id) }}" class="icon fa-heart">{{ $post->likes }}</a>
					</li>
					<li>
						<a class="icon fa-comment">{{ $post->comments->count() }}</a>
					</li>
				</ul>
			</footer>
		</article>
	@endforeach

	<!-- Pagination -->
	{{ $posts->links() }}

@endsection
