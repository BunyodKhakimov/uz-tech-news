@extends('layouts.demo')

@section('title', 'Posts')

@section('content')
<!-- Post -->
<article class="post">
	<header>
		<div class="title">
			<h2><a href="#">@lang('info.post.header')</a></h2>
			<p>@lang('info.post.edit_create')</p>
		</div>
		<div class="meta">
			<a href="{{ route('posts.create') }}" class="button btn-block">
				@lang('info.post.new')
			</a>
		</div>
	</header>
	<div class="table-wrapper">
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>@lang('header.title')</th>
					<th>@lang('header.subtitle')</th>
					<th>@lang('header.category')</th>
					<th>@lang('header.body')</th>
					<th>@lang('header.author')</th>
					<th>@lang('header.actions')</th>
				</tr>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>{{ $post->subtitle }}</td>
					<td>{{ $post->category->name }}</td>
					<td>
						{{ substr(strip_tags($post->body), 0, 80) }}
						{{ strlen(strip_tags($post->body))>80 ? "..." : "" }}
					</td>
					<td>{{ $post->user->name }}</td>
					<td>
						<div class="row">
							<a href="{{ route('posts.show', $post->id) }}" class="btn icon fa-photo" title="Show"></a>
							@if($post->hidden)
							<a href="{{ route('hidePost', $post->id) }}" class="btn icon fa-eye" title="Make visible"></a>
							@else
							<a href="{{ route('hidePost', $post->id) }}" class="btn icon fa-eye-slash" title="Hide"></a>
							@endif
						</div>
						<form action="{{ route('posts.destroy', $post->id) }}" method="post" id="delete_form_{{ $post->id }}">
							<div class="row">
								<a href="{{ route('posts.edit', $post->id) }}" class="btn icon fa-edit"
								title="Edit"></a>
								@csrf
								@method("DELETE")
								<a href="javascript:{}" onclick="document.getElementById('delete_form_{{ $post->id }}').submit();" class="btn icon fa-trash" title="Delete"></a>
							</div>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<!-- Pagination -->
	{{ $posts->links() }}
</article>
@endsection