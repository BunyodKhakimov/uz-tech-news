@extends('layouts.demo')

@section('title', )
	Post #{{ $post->id }}
@endsection

@section('content')
	<article class="post">
		<header>
			<div class="title">
				<h2>{{ $post->title }}</h2>
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
				<a href="#" class="author">
					<span class="name">
						{{ $post->user->name }}
					</span>
					<img src="{{ asset('images/profile.png') }}" alt="" />
				</a>
			</div>
		</header>
		<section>
			<p>
				{{-- <span class="image left">
					<img src="{{ asset('images/pic13.jpg') }}" alt="" />
				</span> --}}
				{!! $post->body !!}
				{{-- <script>alert("Hello World");</script> --}}
			</p>
		</section>
		<footer>
			<form action="{{ route('posts.destroy', $post->id) }}" method="post" id="delete_form">
				@csrf
				@method('DELETE')
				<ul class="stats">
					<li>
						<a href="{{ route('category', $post->category->id) }}">
							{{ $post->category->name }}
						</a>
					</li>
					<li>
						<a href="{{ route('likePost', $post->id) }}" class="icon fa-heart">
							{{ $post->likes }}
						</a>
					</li>
					<li>
						<a data-toggle="collapse" href="#collapseComment" role="button" aria-expanded="false" aria-controls="collapseComment" class="icon fa-comment">
							{{ $post->comments->count() }}
						</a>
					</li>
					@if(Auth::check())
					<li>
						<a href="{{ route('posts.edit', $post->id) }}" class="icon fa-edit">Edit</a>
					</li>
					<li>
						<a href="javascript:{}" onclick="document.getElementById('delete_form').submit();" class="icon fa-trash">Delete</a>
					</li>
					@endif
				</ul>
			</form>
		</footer>
		<div class="collapse" id="collapseComment">
			<div class="card card-body">
				<section>
					<h3>Comments</h3>
					<div class="mini-posts">
						@foreach($post->comments as $comment)
							<article class="mini-post">
								<header>
									<h3 class="w-75">{{ $comment->body }}</h3>
									<time class="published w-50" datetime="2015-10-20">
										{{ date('F j, Y', strtotime($comment->created_at))}}
									</time>
									<a href="#" class="author w-25">
										<span class="name">
											{{ $comment->user->name }}
										</span>
										<img src="{{ asset('images/profile.png') }}" alt="" />
									</a>
								</header>
							</article>
						@endforeach
					</div>
					<form method="post" action="{{ route('comments.store', $post->id) }}">
						@csrf
						<div class="row uniform">
							<div class="12u$">
								<textarea name="body" placeholder="Enter your comment..." rows="3" required></textarea>
							</div>
							<div class="6u$">
								<ul class="actions">
									<li>
										<input type="submit"
										value="Send comment"
										@if(!Auth::check())
											disabled
										@endif/>
									</li>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
	</article>
@endsection