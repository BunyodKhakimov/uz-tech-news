@extends('layouts.demo')

@section('title', 'Create Post')

@section('stylesheets')
	<link rel="stylesheet" href="{{asset('css/style.css')}}" />
	<link rel="stylesheet" href="{{asset('css/select2.css')}}" />

	{{-- WYSWYG TinyMCE for multiple select --}}
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
			<h2><a href="#">@lang('info.post.create_title')</a></h2>
			<p>@lang('info.post.create_subtitle')</p>
		</div>
		<div class="meta">
            <p>On board since:</p>
			<time class="published" datetime="2015-10-18">{{ date('F j, Y', strtotime(Auth::user()->created_at))}}</time>
			<a href="#" class="author"><span class="name">{{ Auth::user()->name }}</span><img src="{{ asset('images/profile.png') }}" alt="" /></a>
		</div>
	</header>
	<section>
		<h3>@lang('header.form')</h3>
		<form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data" novalidate>
			@csrf
			<div class="row uniform">
				<div class="6u 12u$(xsmall)">
					<input type="text" name="title" id="title" value=""
					placeholder="@lang('form.title')" required maxlength="100" />
				</div>
				<div class="6u$ 12u$(xsmall)">
					<input type="text" name="subtitle" id="subtitle" value=""
					placeholder="@lang('form.subtitle')" required maxlength="100" />
				</div>
				<div class="12u$">
					<div class="select-wrapper">
						<select name="category_id" id="category" required>
							<option value="">- @lang('header.categories') -</option>
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
					<textarea name="body" id="mytextarea"
					placeholder="@lang('form.enter_article')" rows="8" required></textarea>
				</div>
				<div class="12u$">
					<ul class="actions">
						<li>
							<a class="button icon fa-upload" onclick="document.getElementById('inputFile').click();">
								@lang('button.upload')
							</a>
							<input class="fileInput" type="file" id="inputFile" name="image" multiple style="display: none"/>
						</li>
						<li>
							<input type="submit" value="@lang('button.submit')"/>
						</li>
					</ul>
				</div>
			</div>
		</form>
	</section>
</article>
@endsection

@section('scripts')

{{-- Script to select multiple items, for tags --}}

<script src="{{ asset('js/select2.js') }}"></script>
<script>
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2(
			{
				placeholder: '   @lang('form.select_tag')'
			}
		);
	});
</script>
@endsection
