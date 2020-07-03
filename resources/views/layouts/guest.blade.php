<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from www.vasterad.com/themes/workscout_2019/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 07:55:49 GMT -->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/colors.css') }}">

@yield('styles')



</head>

<body>
<div id="wrapper">


<!-- Header
================================================== -->
<header class="sticky-header">
<div class="container">
	<div class="sixteen columns">

		<!-- Logo -->
		<div id="logo">
			<h1><a href="/"><img src="images/logo.png" alt="Work Scout" /></a></h1>
		</div>

		<!-- Menu -->
		<nav id="navigation" class="menu">
			<ul id="responsive">
				<li><a href="/">Home</a></li>
				<li><a href="/browse-artisans">Browse Artisans</a></li>
				<li><a href="/browse-categories">Browse Categories</a></li>
			</ul>


			<ul class="responsive float-right">
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}#tab2"><i class="fa fa-user"></i> {{ __('Sign Up') }}</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> <i class="fa fa-lock"></i> {{ __('Log In') }}</a>
                    </li>
                @else
                	<li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}"> <i class="fa fa-lock"></i>{{ __('Dashboard') }}</a>
                    </li>
										<li class="nav-item">
											<a class="nav-link" href="{{ route('logout') }}"
												onclick="event.preventDefault();
																document.getElementById('logout-form').submit();">
												{{ __('Logout') }}
											</a>
                    </li>
                    

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
			</ul>

		</nav>

		<!-- Navigation -->
		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i> Menu</a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>


@yield('content')


<!-- Footer
================================================== -->


<div id="footer">
	<!-- Main -->
	<div class="container">

		<div class="seven columns">
			<h4>Artisan Connect</h4>
			<p>Morbi convallis bibendum urna ut viverra. Maecenas quis consequat libero, a feugiat eros. Nunc ut lacinia tortor morbi ultricies laoreet ullamcorper phasellus semper.</p>
			<a href="{{ route('login') }}" class="button">Get Started</a>
		</div>

		<div class="two columns"><div>&nbsp;</div></div>

		<div class="three columns">
			<h4>Company</h4>
			<ul class="footer-links">
				<li><a href="#">About Us</a></li>
				<li><a href="#">Careers</a></li>
				<li><a href="#">Our Blog</a></li>
				<li><a href="#">Terms of Service</a></li>
				<li><a href="#">Privacy Policy</a></li>
			</ul>
		</div>
			
		<div class="three columns">
			<h4>Browse</h4>
			<ul class="footer-links">
				<li><a href="#">Artisans by Category</a></li>
				<li><a href="#">Artisans in Lagos</a></li>
				<li><a href="#">Find Jobs</a></li>

			</ul>
		</div>

	</div>

	<!-- Bottom -->
	<div class="container">
		<div class="footer-bottom">
			<div class="sixteen columns">
				<h4>Follow Us</h4>
				<ul class="social-icons">
					<li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
					<li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
					<li><a class="instagram" href="#"><i class="icon-instagram"></i></a></li>
					<li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
				<div class="copyrights">©  Copyright 2020 by <a href="#">ArtisanConnect</a>. All Rights Reserved.</div>
			</div>
		</div>
	</div>

</div>

<!-- Back To Top Button -->
<div id="backtotop"><a href="#"></a></div>

</div>
<!-- Wrapper / End -->


<!-- Scripts
================================================== -->
<script src="{{ asset('scripts/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('scripts/jquery-migrate-3.1.0.min.js') }}"></script>
<script src="{{ asset('scripts/custom.js') }}"></script>
<script src="{{ asset('scripts/jquery.superfish.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.themepunch.showbizpro.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.flexslider-min.js') }}"></script>
<script src="{{ asset('scripts/chosen.jquery.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('scripts/waypoints.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('scripts/jquery.jpanelmenu.js') }}"></script>
<script src="{{ asset('scripts/stacktable.js') }}"></script>
<script src="{{ asset('scripts/slick.min.js') }}"></script>
<script src="{{ asset('scripts/headroom.min.js') }}"></script>

@yield('scripts')






</body>

<!-- Mirrored from www.vasterad.com/themes/workscout_2019/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 07:54:23 GMT -->
</html>