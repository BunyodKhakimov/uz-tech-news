@extends('layouts.demo')

@section('title','Contact')

@section('content')
<!-- Post -->
<article class="post">
	<header>
		<div class="title">
			<h2>@lang('info.contact.title')</h2>
			<p>@lang('info.contact.subtitle')</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-10-18">October 18, 2015</time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/profile.png') }}" alt="" /></a>
		</div>
	</header>
	<section>
		<h3>@lang('header.form')</h3>
		<form method="post" action="{{ route('postContact') }}">
			@csrf
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input type="text" name="email" value="" 
					placeholder="@lang('form.email')" required maxlength="100" />
				</div>
				<div class="6u$ 12u$(xsmall)">
					<input type="text" name="subject" value="" 
					placeholder="@lang('form.subject')" required maxlength="100" />
				</div>
				<div class="12u$">
					<textarea name="body" id="body" 
					placeholder="@lang('form.enter_message')" rows="6" required></textarea>
				</div>
				<div class="12u$">
					<ul class="actions">
						<li>
							<input type="submit" value="@lang('button.send')"/>
						</li>
					</ul>
				</div>
			</div>
		</form>
	</section>
</article>
@endsection