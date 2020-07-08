<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

<!-- Basic Page Needs
================================================== -->
<meta charset="utf-8">
<title>ArtisanConnect</title>

<!-- Mobile Specific Metas
================================================== -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS
================================================== -->
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<!-- <link rel="stylesheet" href="dashboard-2.html"> -->
<link rel="stylesheet" href="{{ asset('css/colors.css') }}">

@yield('styles')


<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
</head>

<body>
<div id="wrapper">



<!-- Header
================================================== -->
<header class="dashboard-header">
    <div class="container">
        <div class="sixteen columns">

            <!-- Logo -->
            <div id="logo">
                <h1><a href="/"><img src="{{ asset('images/logo.png') }}" alt="ArtisanConnect" /></a></h1>
            </div>

            <!-- Menu -->
            <nav id="navigation" class="menu">
                <!-- <ul id="responsive">
                    <li><a href="#">Listings</a></li>
                    <li><a href="#">Browse Categories</a></li>
                </ul>
 -->
                <ul class="responsive float-right">
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="#tab2"><i class="fa fa-user"></i> {{ __('Sign Up') }}</a>
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
                <a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
            </div>

        </div>
    </div>
</header>
<div class="clearfix"></div>

<!-- Dashboard -->
<div id="dashboard">

	<!-- Navigation
	================================================== -->

	<!-- Responsive Navigation Trigger -->
	<a href="#" class="dashboard-responsive-nav-trigger"><i class="fa fa-reorder"></i> Dashboard Navigation</a>

	<div class="dashboard-nav">
		<div class="dashboard-nav-inner">

			<ul data-submenu-title="Home">
				<li class="active"><a href="{{url("dashboard")}}">Dashboard</a></li>
			</ul>
			@if(Auth::user()->type == 4)
			<ul data-submenu-title="Portfolio">
				<li><a href="{{url("dashboard/manage_skills")}}">Manage Skills</a></li>
				<li><a href="{{url("dashboard/add_skills")}}">Add Skills</a></li>
			</ul>	
			@endif

			<ul data-submenu-title="Services">
				<li><a href="{{url("dashboard/manage_tasks")}}">Pending Tasks</a></li>
				<li><a href="{{url("dashboard/completed_tasks")}}">Completed Tasks</a></li>
			</ul>	

			<ul data-submenu-title="Account">
				<li><a href="{{url("dashboard/profile")}}">My Profile</a></li>
				
				<li>
					<a class="nav-link" href="{{ route('logout') }}"
							onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>
				</li>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>

			</ul>
			
		</div>
	</div>
	<!-- Navigation / End -->

    <!-- Content
	================================================== -->
	<div class="dashboard-content">

@yield('content')

            <!-- Copyrights -->
            <div class="col-md-12">
				<div class="copyrights">© 2020 ArtisanConnect. All Rights Reserved.</div>
			</div>
		</div>

	</div>
	<!-- Content / End -->


</div>
<!-- Dashboard / End -->


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

@yield('scripts')


</body>

<!-- Mirrored from www.vasterad.com/themes/workscout_2019/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 07:55:46 GMT -->
</html>