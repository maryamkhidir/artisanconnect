<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->

<!-- Mirrored from www.vasterad.com/themes/workscout_2019/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 07:53:10 GMT -->
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

<style>
	.category-small-box {
    width: calc(100% * (1/3) - 40px) !important;
		margin: 40px 0 0 40px;
    padding: 40px;
	}
	.listing-type{
		color: #333 !important;
    border-color: unset !important;
    background-color: unset !important;
    border: unset;
    font-size: 14px;
}
.checked{
	color: orange;
	font-size: 14px;
}
.cov {
    object-fit: cover;
    height: 250px;
		margin: auto;
		margin-bottom: 20px;
		border-radius: 10px;
  }
</style>


</head>

<body>
<div id="wrapper">


<!-- Header
================================================== -->
<header class="transparent sticky-header">
<div class="container">
	<div class="sixteen columns">
	
		<!-- Logo -->
		<div id="logo">
			<h1><a href="/"><img src="{{ asset('images/logo2.png') }}" alt="ArtisanConnect" /></a></h1>
		</div>

		<!-- Menu -->
		<nav id="navigation" class="menu">
			<ul id="responsive">
				<li><a href="/">Home</a></li>
				<li><a href="/browse-artisans">Browse Artisans</a></li>
				<li><a href="/browse-categories">Browse Categories</a></li>
			</ul>


			<ul class="float-right">
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
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
		</div>

	</div>
</div>
</header>
<div class="clearfix"></div>


<!-- Banner
================================================== -->
<div id="banner" class="with-transparent-header parallax background" style="background-image: url(images/banner-home-02.jpg)" data-img-width="2000" data-img-height="1330" data-diff="300">
	<div class="container">
		<div class="sixteen columns">
			
			<div class="search-container">

				<!-- Form -->
				<h2>Find Skill</h2>
			<form action="{{route('home-search')}}" method="post">
				@csrf
					<input type="text" name="title" required class="ico-01" placeholder="Skill Title, Keywords or Artisan Name" value=""/>
					<input type="text" name="location" class="ico-02" placeholder="Location, City or State" value=""/>
					<button type="submit"><i class="fa fa-search"></i></button>
				</form>
				

				<!-- Browse Jobs -->
				<div class="browse-jobs">
					Browse skilled artisans by <a href="/browse-categories"> category</a> {{-- or <a href="#">location</a> --}}
				</div>
				
				<!-- Announce -->
				<div class="announce">
					We’ve over <strong>10,000</strong> skilled artisans for you!
				</div> 

			</div>

		</div>
	</div>
</div>


<!-- Content
================================================== -->

<!-- Categories -->
<div class="container">
	<div class="sixteen columns">
		<h3 class="margin-bottom-20 margin-top-10">Popular Categories</h3>

			<!-- Popular Categories -->
			<div class="categories-boxes-container">
				
				<!-- Box -->
				<a href="/browse-artisans?skill=mechanic" class="category-small-box">
					<i class="ln ln-icon-Worker"></i>
					<h4>Mechanics</h4>
					<span>32</span>
				</a>

				<!-- Box -->
				<a href="/browse-artisans?skill=carpenter" class="category-small-box">
					<i class="ln ln-icon-Hammer"></i>
					<h4>Carpenters</h4>
					<span>76</span>
				</a>

				<!-- Box -->
				<a href="/browse-artisans?skill=electrician" class="category-small-box">
					<i class="ln ln-icon-Power-Cable"></i>
					<h4>Electricians</h4>
					<span>31</span>
				</a>

				<!-- Box -->
				<a href="/browse-artisans?skill=rewire" class="category-small-box">
					<i class="ln  ln-icon-Wrench"></i>
					<h4>Rewires</h4>
					<span>76</span>
				</a>

				<!-- Box -->
				<a href="/browse-artisans?skill=tailor" class="category-small-box">
					<i class="ln ln-icon-Thread"></i>
					<h4>Tailors</h4>
					<span>67</span>
				</a>

				<!-- Box -->
				<a href="/browse-artisans?skill=hair-stylist" class="category-small-box">
					<i class="ln ln-icon-Hair"></i>
					<h4>Hair Stylists</h4>
					<span>96</span>
				</a>

			</div>

		<div class="clearfix"></div>
		<div class="margin-top-30"></div>

		<a href="/browse-categories" class="button centered">Browse All Categories</a>
		<div class="margin-bottom-55"></div>
	</div>
</div>


<div class="container">
	
	<!-- Recent Jobs -->
	<div class="eleven columns">
	<div class="padding-right">
		<h3 class="margin-bottom-25">Top Artisans</h3>
		<div class="listings-container">
			
			@foreach ($collection as $data)
				@php				
					if ($data->experience == '0to3')
						$class = "full-time";
					else if($data->experience == '3to5')
						$class = "part-time";
					else
						$class = "freelance";
				@endphp
				<!-- Listing -->
				<a href="view-artisan?userid={{$data->id}}" class="listing {{$class}}">
					<div class="listing-logo">
						<img src="@if($data->image) {{url('uploads/'.$data->image)}} @else http://www.gravatar.com/avatar/000000000000000000000000000000007cd7.png?d=mm&amp;s=300 @endif " alt="{{$data->image}}">
					</div>
					<div class="listing-title">
						<h4>{{$data->name}} 
							<span class="listing-type" title="{{$data->star}}">
								@for ($i = 0; $i < (int)$data->star; $i++)<span class="fa fa-star checked"></span>@endfor
								@if ((int) $data->star != $data->star)<span class="fa fa-star-half-o checked"></span>@endif	
								@for ($i = 0; $i < (int)(5 - $data->star); $i++)<span class="fa fa-star"></span>@endfor
							</span>
						</h4>
						<ul class="listing-icons">
							<li><i class="fa fa-map-marker"></i>{{$data->state}}</li>
              <li><i class="fa fa-clock-o"></i> {{ str_replace("to","-",$data->experience) }} years</li>
						</ul>
						<ul class="listing-icons margin-top-5">
							@foreach ($data->skills as $skills)
							<li>
							<div class="listing-date new" style="text-transform: capitalize">{{$skills->skill}}</li>
						@endforeach
						</ul>
					</div>
				</a>
			@endforeach
			
		</div>

		<a href="/browse-artisans" class="button centered"><i class="fa fa-plus-circle"></i> Show More Artisans</a>
		<div class="margin-bottom-55"></div>
	</div>
	</div>

	<!-- Job Spotlight -->
	<div class="five columns">
		<h3 class="margin-bottom-5">Spotlight Artisan</h3>

		<!-- Navigation -->
		{{-- <div class="showbiz-navigation">
			<div id="showbiz_left_1" class="sb-navigation-left"><i class="fa fa-angle-left"></i></div>
			<div id="showbiz_right_1" class="sb-navigation-right"><i class="fa fa-angle-right"></i></div>
		</div> --}}
		<div class="clearfix"></div>
		
		<!-- Showbiz Container -->
		<div id="job-spotlight" class="showbiz-container">
			<div class="showbiz" {{-- data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1"  --}}>
				<div class="overflowholder">

					<ul>

						<li>
							<div class="job-spotlight">
								<img src="@if($spot_artisan->image) {{url('uploads/'.$spot_artisan->image)}} @else http://www.gravatar.com/avatar/000000000000000000000000000000007cd7.png?d=mm&amp;s=300 @endif " alt="{{$spot_artisan->image}}" class="cov"/>
								<a href="#">
									<h4><strong>{{$spot_artisan->name}}</strong> <br/>
										<div title="{{$spot_artisan->star}}">
											@for ($i = 0; $i < (int)$spot_artisan->star; $i++)<b class="fa fa-star checked"></b>@endfor @if ((int) $spot_artisan->star != $spot_artisan->star)<b class="fa fa-star-half-o checked"></b>@endif	
											@for ($i = 0; $i < (int)(5 - $spot_artisan->star); $i++)<b class="fa fa-star" style="font-size: 14px"></b>@endfor
										</div>
									</h4>
								</a>
									<span><i class="fa fa-map-marker"></i>{{$spot_artisan->state}}</span>
									<span><i class="fa fa-clock-o"></i> {{ str_replace("to","-",$spot_artisan->experience) }} years</span>

								<p>{{$spot_artisan->description}}</p>
								<a href="view-artisan?userid={{$spot_artisan->userid}}" class="button">Connect with Artisan</a>
							</div>
						</li>

					</ul>
					<div class="clearfix"></div>

				</div>
				<div class="clearfix"></div>
			</div>
		</div>

	</div>
</div>


<!-- Flip banner -->
<div class="margin-top-15">
	<a href="/browse-artisans" class="flip-banner margin-top-25" data-background="images/all-categories-photo.jpg" data-color="#26ae61" data-color-opacity="0.93">
		<div class="flip-banner-content">
			<h2 class="flip-visible">Step inside and see for yourself!</h2>
			<h2 class="flip-hidden">Get Started <i class="fa fa-angle-right"></i></h2>
		</div>
	</a>
</div>

<!-- Flip banner / End -->



<section class="fullwidth-testimonial margin-top-0">

	<!-- Info Section -->
	<div class="container">
		<div class="sixteen columns">
			<h3 class="headline centered">
				What Our Users Say 😍
				<span class="margin-top-25">We collect reviews from our users so you can get an honest opinion of what an experience with our website are really like!</span>
			</h3>
		</div>
	</div>
	<!-- Info Section / End -->

	<!-- Testimonials Carousel -->
	<div class="fullwidth-carousel-container margin-top-20">
		<div class="testimonial-carousel testimonials">
			
			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close.</div>
				</div>
				<div class="testimonial-author">
					<img src="{{ asset('images/resumes-list-avatar-03.png') }}" alt="">
					<h4>Tom Baker <span>HR Specialist</span></h4>
				</div>
			</div>

			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation is on the runway heading towards a streamlined cloud content.</div>
				</div>
				<div class="testimonial-author">
					<img src="{{ asset('images/resumes-list-avatar-02.png') }}" alt="">
					<h4>Jennie Smith <span>Jobseeker</span></h4>
				</div>
			</div>

			<!-- Item -->
			<div class="fw-carousel-review">
				<div class="testimonial-box">
					<div class="testimonial">Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view.</div>
				</div>
				<div class="testimonial-author">
					<img src="{{ asset('images/resumes-list-avatar-01.png') }}" alt="">
					<h4>Jack Paden <span>Jobseeker</span></h4>
				</div>
			</div>

		</div>
	</div>
	<!-- Testimonials Carousel / End -->

</section>


<!-- Footer
================================================== -->

<div id="footer">
	<!-- Main -->
	<div class="container">

		<div class="seven columns">
			<h4>ArtisanConnect</h4>
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
				<li><a href="#">Find Artisans</a></li>

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






</body>

<!-- Mirrored from www.vasterad.com/themes/workscout_2019/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Jun 2020 07:54:23 GMT -->
</html>