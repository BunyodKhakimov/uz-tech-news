@extends('layouts.demo')

@section('title', 'Edit Post')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection

@section('content')
<!-- Post -->
<article class="post">
	<header>
		<div class="title">
			<h2><a href="#">Edit Post</a></h2>
			<p>Here you can edit a post</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-10-18">
				{{ date('F j, Y', strtotime($post->created_at))}}
			</time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/profile.png') }}" alt="" /></a>
		</div>
	</header>
	<section>
		<h3>Form</h3>
		<form method="post" action="{{ route('posts.update', $post->id) }}">
			@csrf
			@method('PUT')
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input type="text" name="title" id="title" value="{{ $post->title }}" placeholder="Title" required maxlength="100" />
				</div>
				<div class="6u$ 12u$(xsmall)">
					<input type="text" name="subtitle" id="subtitle" value="{{ $post->subtitle }}" placeholder="Subtitle" required maxlength="100" />
				</div>
				<div class="12u$">
					<div class="select-wrapper">
						<select name="category" id="category" required>
							<option value="">- Category -</option>
							<option value="manufacturing">Manufacturing</option>
							<option value="shipping">Shipping</option>
							<option value="administration">Administration</option>
							<option value="economy">Economy</option>
						</select>
					</div>
				</div>
				<div class="12u$">
					<textarea name="body" id="body" placeholder="Enter article body here" rows="6" required>{{ $post->body }}</textarea>
				</div>
				<div class="6u 12u$(small)">
					<input type="checkbox" id="hidden" name="hidden" value="1">
					<label for="hidden">Hidden</label>
				</div>
				<div class="12u$">
					<ul class="actions">
						<li>
							<a class="button icon fa-upload">
								Upload pictures
								<input class="fileInput" type="file" name="file" multiple/>
							</a>
						</li>
						<li>
							<a class="button" href="{{ route('posts.show', $post->id) }}">
								Cancel
							</a>
						</li>
						<li><input type="submit" value="Save"/></li>
					</ul>
				</div>
			</div>
		</form>
	</section>
</article>
@endsection
