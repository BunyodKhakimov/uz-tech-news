@extends('layouts.demo')

@section('title', 'Edit Category')

@section('stylesheets')
	<link rel="stylesheet" href="{{asset('css/style.css')}}" />
@endsection

@section('content')
<!-- Post -->
<article class="post">
	<header>
		<div class="title">
			<h2><a href="#">Edit Category</a></h2>
			<p>Here you can edit a category</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-10-18">
				JANUARY 1, 1970
				{{-- {{ date('F j, Y', strtotime($category->created_at))}} --}}
			</time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/profile.png') }}" alt="" /></a>
		</div>
	</header>
	<section>
		<h3>Enter categories's new name</h3>
		<form method="post" action="{{ route('categories.update', $category->id) }}">
			@csrf
			@method('PUT')
			<div class="row uniform">
				<div class="6u 12u$">
					<input type="text" name="name" id="name" value="{{ $category->name }}" placeholder="{{ $category->name }}" required maxlength="50" />
				</div>
				<div class="6u$">
					<ul class="actions">
						<li><input type="submit" value="Save"/></li>
					</ul>
				</div>
			</div>
		</form>
	</section>
</article>
@endsection
