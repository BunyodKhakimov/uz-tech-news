<!-- Header -->
<header id="header">
	<h1><a href="/">Uz Tech News</a></h1>
	<nav class="links">
		<ul>
			<li><a href="/">Home</a></li>

			<li><a href="/parts">Parts</a></li>

			@if(isset($categories))
				<li>
					<a id="dropdownMenuLinkCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Categories
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
						Tags
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

			<li><a href="/about">About</a></li>
			<li><a href="/contact">Contact</a></li>

			@if(Auth::check())
				<li>
					<a id="dropdownMenuLinkAdmin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Admin
					</a>

					<div class="dropdown-menu" aria-labelledby="dropdownMenuLinkAdmin">
						<a class="dropdown-item" href="/posts">Posts</a>
						<a class="dropdown-item" href="/tags">Tags</a>
						<a class="dropdown-item" href="/categories">Categories</a>
					</div>
				</li>
				
			@endif
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<li class="search">
				<a class="fa-search" href="#search">Search</a>
				<form id="search" method="get" action="#">
					<input type="text" name="search" placeholder="Search" method="post"/>
				</form>
			</li>
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>