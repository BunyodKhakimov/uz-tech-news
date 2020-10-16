@extends('layouts.demo')

@section('title', 'Tags')

@section('content')
<!-- Tag -->
<article class="post">
	<header>
		<div class="title">
			<h2><a href="#">All tags</a></h2>
			<p>Here you can edit tags and create new one.</p>
		</div>
		<hr>
		<div class="meta">
			<form action="{{ route('tags.store') }}" method="post">
				@method('POST')
				@csrf
				<h3 class="text-center">New tag</h3>
				<input type="text" name="name" required placeholder="ex. tag">
				<button class="button fit mt-2" type="submit">
					Create
				</button>
			</form>
		</div>
	</header>
	<div class="table-wrapper">
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>Tag</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			@foreach($tags as $tag)
				<tr>
					<th>{{ $tag->id }}</th>
					<td>{{ $tag->name }}</td>
					<td>
						<form action="{{ route('tags.destroy', $tag->id) }}" id="delete_form_{{ $tag->id }}" method="post">
							<div class="row">
								<a href="{{ route('tags.edit', $tag->id) }}" class="btn icon fa-edit"
								title="Edit"></a>
								@method("DELETE")
								@csrf
								<a href="javascript:{}" onclick="document.getElementById('delete_form_{{ $tag->id }}').submit();" class="btn icon fa-trash" title="Delete"></a>
							</div>
						</form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
</article>
@endsection