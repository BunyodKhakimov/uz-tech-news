<!-- Sidebar -->
<section id="sidebar">
	<!-- Intro -->
	<section id="intro">
		<a href="#" class="logo"><img src="{{asset('images/logo3.jpg')}}" alt="" /></a>
		<header>
			<h2>UzTech.uz</h2>
			<p>Bringing tech news closer</a></p>
		</header>
	</section>
	<!-- Mini Posts -->
	@yield('miniposts')
	<!-- Post List -->
	@yield('postlist')
	<!-- About -->
	<section class="blurb">
		<h2>About</h2>
		<p>Mauris neque quam, fermentum ut nisl vitae, convallis maximus nisl. Sed mattis nunc id lorem euismod amet placerat. Vivamus porttitor magna enim, ac accumsan tortor cursus at phasellus sed ultricies.</p>
		<ul class="actions">
			<li><a href="/about" class="button">Learn More</a></li>
		</ul>
	</section>
	<!-- Footer -->
	<section id="footer">
		<ul class="icons">
			<li><a href="https://twitter.com/" class="fa-twitter"><span class="label">Twitter</span></a></li>
			<li><a href="https://www.facebook.com/" class="fa-facebook"><span class="label">Facebook</span></a></li>
			<li><a href="https://www.instagram.com/" class="fa-instagram"><span class="label">Instagram</span></a></li>
			<li><a href="https://rss.com/" class="fa-rss"><span class="label">RSS</span></a></li>
			<li><a href="https://mail.google.com/mail" class="fa-envelope"><span class="label">Email</span></a></li>
		</ul>
		<p class="copyright">&copy; TechNews. Crafted by: <a href="https://github.com/BunyodKhakimov">Bunik</a>.</p>
	</section>
</section>