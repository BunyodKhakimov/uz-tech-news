@extends('layouts.demo')

@section('title', 'Posts')

@section('content')
<!-- Post -->
<article class="post">
	<div class="row">
		<div class="col-6 col-sm-7 col-lg-8">
			<h2 class="mt-2">All Posts</h2>
		</div>
		<div class="col-6 col-sm-5  col-lg-4">
			<a href="{{ route('posts.create') }}" class="button btn-block">Create Post</a>
		</div>
	</div>
	<div class="table-wrapper mt-4">
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Title</th>
					<th>Subtitle</th>
					<th>Category</th>
					<th>Body</th>
					<th>Author</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($posts as $post)
				<tr>
					<th>{{ $post->id }}</th>
					<td>{{ $post->title }}</td>
					<td>{{ $post->subtitle }}</td>
					<td>{{ $post->category }}</td>
					<td>
						{{ substr($post->body, 0, 80) }}
						{{ strlen($post->body)>80 ? "..." : "" }}
					</td>
					<td>{{ $post->author }}</td>
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