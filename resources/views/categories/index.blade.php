@extends('layouts.demo')

@section('title', 'Categories')

@section('content')
<!-- Category -->
<article class="post">
	<header>
		<div class="title">
			<h2><a href="#">@lang('info.category.header')</a></h2>
			<p>@lang('info.category.edit_create')</p>
		</div>
		<hr>
		<div class="meta">
			<form action="{{ route('categories.store') }}" method="post">
				@method('POST')
				@csrf
				<h3 class="text-center">@lang('info.category.new')</h3>
				<input type="text" name="name" placeholder="ex. category" required>
				<button class="button fit mt-2" type="submit">
					@lang('button.create')
				</button>
			</form>
		</div>
	</header>
	<div class="table-wrapper">
		<table>
			<thead>
				<tr>
					<th>#</th>
					<th>@lang('header.categories')</th>
					<th>@lang('header.actions')</th>
				</tr>
			</thead>
			<tbody>
			@foreach($categories as $category)
				<tr>
					<th>{{ $category->id }}</th>
					<td>{{ $category->name }}</td>
					<td>
						<form action="{{ route('categories.destroy', $category->id) }}" id="delete_form_{{ $category->id }}" method="post">
							<div class="row">
								<a href="{{ route('categories.edit', $category->id) }}" class="btn icon fa-edit"
								title="Edit"></a>
								@method("DELETE")
								@csrf
								<a href="javascript:{}" onclick="document.getElementById('delete_form_{{ $category->id }}').submit();" class="btn icon fa-trash" title="Delete"></a>
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