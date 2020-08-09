@extends('layouts.main')
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
			<a href="#" class="author"><span class="name">Jane Doe</span><img src="images/avatar.jpg" alt="" /></a>
		</div>
	</header>
	<section>
		<h3>Form</h3>
		<form method="post" action="#">
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input type="text" name="demo-name" id="demo-name" value="" placeholder="Title" />
				</div>
				<div class="6u$ 12u$(xsmall)">
					<input type="email" name="demo-email" id="demo-email" value="" placeholder="Subtitle" />
				</div>
				<div class="12u$">
					<div class="select-wrapper">
						<select name="demo-category" id="demo-category">
							<option value="">- Category -</option>
							<option value="1">Manufacturing</option>
							<option value="1">Shipping</option>
							<option value="1">Administration</option>
							<option value="1">Human Resources</option>
						</select>
					</div>
				</div>
				<div class="12u$">
					<textarea name="demo-message" id="demo-message" placeholder="Enter article body here" rows="6"></textarea>
				</div>
				<div class="6u 12u$(small)">
					<input type="checkbox" id="demo-copy" name="demo-copy">
					<label for="demo-copy">Hidden</label>
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