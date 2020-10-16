@extends('layouts.demo')

@section('title','About')

@section('content')
<!-- Post -->
<article class="post">
	<header>
		<div class="title">
			<h2>Contact Page</h2>
			<p>Page to contact us via message</p>
		</div>
		<div class="meta">
			<time class="published" datetime="2015-10-18">October 18, 2015</time>
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="{{ asset('images/profile.png') }}" alt="" /></a>
		</div>
	</header>
	<section>
		<h3>Contact us</h3>
		<form method="post" action="{{ route('postContact') }}">
			@csrf
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input type="text" name="email" value="" placeholder="Email" required maxlength="100" />
				</div>
				<div class="6u$ 12u$(xsmall)">
					<input type="text" name="subject" value="" placeholder="Subject" required maxlength="100" />
				</div>
				<div class="12u$">
					<textarea name="body" id="body" placeholder="Enter message here..." rows="6" required></textarea>
				</div>
				<div class="12u$">
					<ul class="actions">
						<li>
							<input type="submit" value="Send Message"/>
						</li>
					</ul>
				</div>
			</div>
		</form>
	</section>
</article>
@endsection