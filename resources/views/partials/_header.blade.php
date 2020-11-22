<!-- Header -->
<header id="header">
	<h1><a href="/">Uz Tech News</a></h1>
	<nav class="links">
		<ul>
			<li><a href="/">@lang('header.home')</a></li>

			{{-- <li><a href="/parts">Parts</a></li> --}}

			@if(isset($categories))
				<li>
					<a id="dropdownMenuLinkCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						@lang('header.categories')
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkCatgory">
						@foreach($categories as $category)
						    <a class="dropdown-item" href="{{ route('category', $category->id) }}">
							    {{ $category->name }}
							</a>
						@endforeach
					</div>
				</li>
			@endif

			@if(isset($tags))
				<li>
					<a id="dropdownMenuLinkTags" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						@lang('header.tags')
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkTags">
						@foreach($tags as $tag)
						    <a class="dropdown-item" href="#">
							    {{ $tag->name }}
							</a>
						@endforeach
					</div>
				</li>
			@endif

			<li><a href="{{ route('about') }}">@lang('header.about')</a></li>
			<li><a href="{{ route('contact') }}">@lang('header.contact')</a></li>

			<li>
				<a id="dropdownMenuLinkLanguage" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					@lang('header.language')
				</a>

				<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkLanguage">
				    <a class="dropdown-item" href="{{ route('switch-lang', 'ru') }}">
					    RU
					</a>
					<a class="dropdown-item" href="{{ route('switch-lang', 'en') }}">
						EN
					</a>
					<a class="dropdown-item" href="{{ route('switch-lang', 'uz') }}">
					    UZ
					</a>
				</div>
				
			</li>
				

			@if(Auth::check())
				<li>
					<a id="dropdownMenuLinkAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						@lang('header.admin')
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkAdmin">
						<a class="dropdown-item" href="/posts">
							@lang('header.post')
						</a>
						<a class="dropdown-item" href="/tags">
							@lang('header.tags')
						</a>
						<a class="dropdown-item" href="/categories">
							@lang('header.categories')
						</a>
					</div>
				</li>
				
			@endif
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<li class="search">
				<a class="fa-search" href="#search">
					@lang('form.search')
				</a>
				<form id="search" method="get" action="#">
					<input type="text" name="search" placeholder="@lang('form.search')" method="post"/>
				</form>
			</li>
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>