@extends('layouts.main')
@section('content')
<!-- Post -->
<article class="post">
	<div class="row">
		<div class="col-8">
			<h2 class="mt-3">All Posts</h2>
		</div>
		<div class="col-4">
			<ul class="actions">
				<li class="w-100"><a href="{{ route('posts.create') }}" class="button big btn btn-lg btn-default btn-block">Create Post</a></li>
			</ul>
			
		</div>
	</div>
	
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Title</th>
				<th scope="col">Subtitle</th>
				<th scope="col">Category</th>
				<th scope="col">Body</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($posts as $post)
			<tr>
				<th scope="row">{{ $post->id }}</th>
				<td>{{ $post->title }}</td>
				<td>{{ $post->subtitle }}</td>
				<td>{{ $post->category }}</td>
				<td>
					{{ substr($post->body, 0, 50) }}
					{{ strlen($post->body)>50 ? "..." : "" }}
				</td>
				<td>
					<div class="row">
						<a href="{{ route('posts.show', $post->id) }}" class="btn icon fa-eye"></a>
						<a href="{{ route('posts.edit', $post->id) }}" class="btn icon fa-ban"></a>
						
					</div>
					<form action="{{ route('posts.destroy', $post->id) }}" method="post" id="delete_form_{{ $post->id }}">
						<div class="row">
							<a href="{{ route('posts.edit', $post->id) }}" class="btn icon fa-edit"></a>
							@csrf
							@method("DELETE")
							<a href="javascript:{}" onclick="document.getElementById('delete_form_{{ $post->id }}').submit();" class="btn icon fa-trash"></a>
						</div>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</article>
@endsection