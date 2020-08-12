@extends('layouts.main')

@section('stylesheets')
<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection


@section('content')
<!-- Post -->
<article class="post">
	<header>
		<div class="title">
			<h2><a href="#">Create New Post</a></h2>
			<p>Here you can create a new post</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-10-18">October 18, 2015</time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/avatar.jpg') }}" alt="" /></a>
		</div>
	</header>
	<section>
		<h3>Form</h3>
		<form method="post" action="{{ route('posts.store') }}">
			@csrf
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input type="text" name="title" id="title" value="" placeholder="Title" required maxlength="100" />
				</div>
				<div class="6u$ 12u$(xsmall)">
					<input type="text" name="subtitle" id="subtitle" value="" placeholder="Subtitle" required maxlength="100" />
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
					<textarea name="body" id="body" placeholder="Enter article body here" rows="6" required></textarea>
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
						<li><input type="submit" value="Submit"/></li>
					</ul>
				</div>
			</div>
		</form>
	</section>
</article>
@endsection
