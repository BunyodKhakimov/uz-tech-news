<!-- Menu -->
<section id="menu">
	<!-- Search -->
	<section id="searchFormSection">
		<form class="search" method="get" action="#">
			<input type="text" name="query" placeholder="Search" />
		</form>
	</section>
	<!-- Links -->
	<section>
		<ul class="links">
			<li>
				<a href="/">
					<h3>@lang('header.home')</h3>
					{{-- <p>Feugiat tempus veroeros dolor</p> --}}
				</a>
			</li>

			@if(isset($categories) && sizeof($categories) != 0)
				<li>
					<a>
						<h3>@lang('header.categories')</h3>
						@foreach($categories as $category)
							<a href="{{ route('category', $category->id) }}">
						    	<p>{{ $category->name }}</p>
							</a>
						@endforeach
					</a>
				</li>
			@endif

			@if(isset($tags) && sizeof($tags) != 0)
				<li>
					<a>
						<h3>@lang('header.tags')</h3>
						@foreach($tags as $tag)
							<a>
						    	<p>{{ $tag->name }}</p>
							</a>
						@endforeach
					</a>
				</li>
			@endif

			<li>
				<a href="/about">
					<h3>@lang('header.about')</h3>
					{{-- <p>Porta lectus amet ultricies</p> --}}
				</a>
			</li>

			<li>
				<a href="/contact">
					<h3>@lang('header.contact')</h3>
					{{-- <p>Porta lectus amet ultricies</p> --}}
				</a>
			</li>

			<li>
				<a>
					<h3>@lang('header.language')</h3>
					<a href="{{ route('switch-lang', 'ru') }}">
					    <p>RU</p>
					</a>
					<a href="{{ route('switch-lang', 'en') }}">
						<p>EN</p>
					</a>
					<a href="{{ route('switch-lang', 'uz') }}">
					    <p>UZ</p>
					</a>
				</a>
			</li>
		</ul>
	</section>
	<!-- Actions -->
	<section>
		<ul class="actions vertical">
			@if(Auth::check())
				<li>
					<a href="javascript:{}"
		            	onclick="event.preventDefault();
		            	document.getElementById('logout-form').submit();"
		            	class="button big fit">@lang('button.logout')
		            </a>
		        </li>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                @csrf
	            </form>
	        @else
				<li>
					<a href="/login" class="button big fit">
						@lang('button.login')
					</a>
				</li>
				<li>
					<a href="/register" class="button big fit">
						@lang('button.register')
					</a>
				</li>
			@endif
		</ul>
	</section>
</section>
