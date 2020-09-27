@extends('layouts.demo')

@section('title', 'Edit Post')

@section('stylesheets')
	<link rel="stylesheet" href="{{asset('css/style.css')}}" />
	<link rel="stylesheet" href="{{asset('css/select2.css')}}" />

	{{-- WYSWYG TinyMCE --}}
	<script src="https://cdn.tiny.cloud/1/ueed0lgrhz99vu93ro4dvrwy946jqnx6hdybhdr15wk8qodg/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        menubar: false
      });
    </script>
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
		<form method="post" action="{{ route('posts.update', $post->id) }}" novalidate>
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
						<select name="category_id" id="category" required>
							<option value="">- Category -</option>
							@foreach($categories as $category)
								<option value="{{ $category->id }}">
									{{ $category->name }}
								</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="12u$">
					<div class="select-wrapper">
						<select class="js-example-basic-multiple" name="tags[]" multiple="multiple" id="tag">
						  @foreach($tags as $tag)
								<option value="{{ $tag->id }}">
									{{ $tag->name }}
								</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="12u$">
					<textarea name="body" id="mytextarea" placeholder="Enter article body here..." rows="8" required>{{ $post->body }}</textarea>
				</div>
				<div class="6u 12u$(small)">
					<input type="checkbox" id="hidden" name="hidden" value="1">
					<label for="hidden">Hidden</label>
				</div>
				<div class="12u$">
					<ul class="actions">
						<li>
							<a class="button icon fa-upload" onclick="document.getElementById('inputFile').click();">
								Upload pictures
							</a>
							<input class="fileInput" type="file" id="inputFile" name="file" multiple style="display: none"/>
						</li>
						<li><input type="submit" value="Save"/></li>
					</ul>
				</div>
			</div>
		</form>
	</section>
</article>
@endsection

@section('scripts')
<script src="{{ asset('js/select2.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2(
			{
				placeholder: '   Select tags'
			}
		);
	});
</script>
@endsection
