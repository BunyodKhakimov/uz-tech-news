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
					<h3>Home</h3>
					<p>Feugiat tempus veroeros dolor</p>
				</a>
			</li>
			<li>
				<a>
					<h3>Categories</h3>
					<a href="{{ route('category', 'manufactoring') }}">
				    <p>Manufactoring</p>
					</a>
					<a href="{{ route('category', 'shipping') }}">
					    <p>Shipping</p>
					</a>
				    <a href="{{ route('category', 'administration') }}">
				    	<p>Administration</p>
				    </a>
				    <a href="{{ route('category', 'economy') }}">
				    	<p>Economy</p>
				    </a>
				</a>
				
			</li>
			@if(Auth::check())
				<li>
					<a href="/posts">
						<h3>Posts</h3>
						<p>Phasellus sed ultricies mi congue</p>
					</a>
				</li>
			@endif
			<li>
				<a href="/about">
					<h3>About</h3>
					<p>Porta lectus amet ultricies</p>
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
		            	class="button big fit">Logout
		            </a>
		        </li>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                @csrf
	            </form>
	        @else
				<li>
					<a href="/login" class="button big fit">Log In</a>
				</li>
				<li>
					<a href="/register" class="button big fit">Register</a>
				</li>
			@endif
		</ul>
	</section>
</section>