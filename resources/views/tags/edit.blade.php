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
			<h2><a href="#">@lang('info.tag.edit_title')</a></h2>
			<p>@lang('info.tag.edit')</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-10-18">
				JANUARY 1, 2020
				{{-- {{ date('F j, Y', strtotime($tag->created_at))}} --}}
			</time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/profile.png') }}" alt="" /></a>
		</div>
	</header>
	<section>
		<h3>@lang('info.tag.enter_new')</h3>
		<form method="post" action="{{ route('tags.update', $tag->id) }}">
			@csrf
			@method('PUT')
			<div class="row uniform">
				<div class="6u 12u$">
					<input type="text" name="name" id="name" value="{{ $tag->name }}" placeholder="{{ $tag->name }}" required maxlength="50" />
				</div>
				<div class="6u$">
					<ul class="actions">
						<li><input type="submit" value="@lang('button.save')"/></li>
					</ul>
				</div>
			</div>
		</form>
	</section>
</article>
@endsection
