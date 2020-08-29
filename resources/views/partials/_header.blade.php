<!-- Header -->
<header id="header">
	<h1><a href="/">Uz Tech News</a></h1>
	<nav class="links">
		<ul>
			<li><a href="/">Home</a></li>
			<li><a href="/parts">Parts</a></li>
			@if(Auth::check())
				<li><a href="/posts">Posts</a></li>
			@endif
			<li><a href="/about">About</a></li>
		</ul>
	</nav>
	<nav class="main">
		<ul>
			<li class="search">
				<a class="fa-search" href="#search">Search</a>
				<form id="search" method="get" action="#">
					<input type="text" name="query" placeholder="Search" />
				</form>
			</li>
			<li class="menu">
				<a class="fa-bars" href="#menu">Menu</a>
			</li>
		</ul>
	</nav>
</header>