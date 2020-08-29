@extends('layouts.main')

@section('title', )
Post #{{ $post->id }}
@endsection

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/app.css')}}" />
@endsection

@section('content')
<!-- Post -->
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
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/profile.png') }}" alt="" /></a>
		</div>
	</header>
	<section>
		<p><span class="image left"><img src="{{ asset('images/pic13.jpg') }}" alt="" /></span>{{ $post->body }}</p>
	</section>
	<footer>
		<form action="{{ route('posts.destroy', $post->id) }}" method="post" id="delete_form">
			@csrf
			@method('DELETE')
			<ul class="stats">
				<li><a href="#">{{ $post->category }}</a></li>
				<li><a href="#" class="icon fa-heart">28</a></li>
				<li><a href="#" class="icon fa-comment">128</a></li>
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
</article>
@endsection