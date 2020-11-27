@extends('layouts.demo')

@section('title', )
	{{ auth()->user()->name }}
@endsection

@section('content')
	<article class="post">

		<header>
			<div class="title">
				<h2>Profile</h2>
				<p>Enjoy yourself</p>
			</div>
			<div class="meta">
				<p>On board since:</p>
				<time class="published" datetime="2015-10-18">
					{{ date('F j, Y', strtotime(auth()->user()->created_at))}}
				</time>
				{{-- <a class="author">
					<span class="name">
						{{ auth()->user()->name }}
					</span>
					<img src="{{ asset('images/profile.png') }}" alt="" />
				</a> --}}
				<span class="badge badge-secondary text-capitalize">Admin</span>
			</div>
		</header>

		<section>
			<p>
				<span class="image left">
					<img src="{{ asset('images/profile.png') }}" alt="" />
				</span>
				<strong>ID:</strong> {{ auth()->user()->id }} <br>
				<strong>Name:</strong> {{ auth()->user()->name }} <br>
				<strong>Email:</strong> {{ auth()->user()->email }} <br>
				<strong>About:</strong>
				Lorem, ipsum dolor sit amet, consectetur adipisicing elit. Sed ullam delectus facere distinctio laudantium ipsum dolores enim a, provident hic dolor recusandae quae rem nobis eos, fuga eius perferendis repellat id ad? Modi repudiandae consequatur, molestias. Obcaecati illo vero doloribus labore accusantium quam dolorem natus itaque, distinctio sunt nihil, cumque voluptatem perspiciatis provident sint delectus deserunt, vel corporis suscipit corrupti facilis pariatur. Corrupti, labore? Sint expedita est ipsam dolorum consequatur eum labore veniam placeat rem facere! Error quia voluptate vitae commodi fugiat cum tempora voluptates quisquam, nisi sint esse fuga delectus, facere minus ex distinctio, quasi optio id. Facere, modi.
				{{-- <script>alert("Hello World");</script> --}}
			</p>
		</section>

		<footer>
			
				<ul class="stats">
					<li>
						<a>Admin</a>
					</li>
					<li>
						<a class="icon fa-heart">28</a>
					</li>
					<li>
						<a class="icon fa-file">
							{{ auth()->user()->post()->count() }}
						</a>
					</li>
					{{-- <li>
						<a data-toggle="collapse" href="#collapseComment" role="button" aria-expanded="false" aria-controls="collapseComment" class="icon fa-comment">
							{{ $post->comments->count() }}
						</a>
					</li> --}}
				</ul>
		</footer>

		{{-- Comments --}}

		{{-- <div class="collapse" id="collapseComment">
			<div class="card card-body">
				<section>
					<h3>@lang('header.comments')</h3>
					<div class="mini-posts">
						@foreach($post->comments as $comment)
							<article class="mini-post">
								<header>
									<h3 class="w-75">{{ $comment->body }}</h3>
									<time class="published w-50" datetime="2015-10-20">
										{{ date('F j, Y', strtotime($comment->created_at))}}
									</time>
									<a href="#" class="author w-25">
										<span class="name">
											{{ $comment->user->name }}
										</span>
										<img src="{{ asset('images/profile.png') }}" alt="" />
									</a>
								</header>
							</article>
						@endforeach
					</div>
					<form method="post" action="{{ route('comments.store', $post->id) }}">
						@csrf
						<div class="row uniform">
							<div class="12u$">
								<textarea name="body" placeholder="@lang('form.enter_comment')" rows="3" required></textarea>
							</div>
							<div class="6u$">
								<ul class="actions">
									<li>
										<input type="submit"
										value="@lang('button.send_comment')"
										@if(!Auth::check())
											disabled
										@endif/>
									</li>
								</ul>
							</div>
						</div>
					</form>
				</section>
			</div>
		</div>
 --}}
	</article>
@endsection