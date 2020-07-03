@extends('layouts.app')

@section('content')
        <!-- Titlebar -->
        <div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Welcome, {{explode(" ",Auth::user()->name)[0]}}!</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>


		<!-- Content -->
		<div class="row">

			<!-- Item -->
			<div class="col-lg-4 col-md-4">
				<div class="dashboard-stat color-1">
					<div class="dashboard-stat-content"><h4 class="counter">53</h4> <span>Times Viewed</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Eye-Visible"></i></div>
				</div>
			</div>

				<!-- Item -->
			<!-- <div class="col-lg-4 col-md-4">
				<div class="dashboard-stat color-2">
					<div class="dashboard-stat-content"><h4 class="counter">527</h4> <span>Total Job Views</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Bar-Chart"></i></div>
				</div>
			</div> -->


				<!-- Item -->
			<div class="col-lg-4 col-md-4">
				<div class="dashboard-stat color-3">
					<div class="dashboard-stat-content"><h4 class="counter">17</h4> <span>Skills Registered</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Worker"></i></div>
				</div>
			</div>


			<!-- Item -->
				<div class="col-lg-4 col-md-4">
				<div class="dashboard-stat color-4">
					<div class="dashboard-stat-content"><h4 class="counter">36</h4> <span>Jobs Completed</span></div>
					<div class="dashboard-stat-icon"><i class="ln ln-icon-Add-UserStar "></i></div>
				</div>
			</div>

		</div>

        <div class="row">
			
			<!-- Recent Activity -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box margin-top-20">
					<h4>Get Started</h4>
					<ul>
						<li>
							Increase your visibility by <strong><a href="#">adding a profile picture</a></strong>
						</li>

						<li>
                <strong><a href="#">Add relevant skills and credentials</a></strong> to boost your profile
						</li>

						<li>
							Be reachable to your clients. <strong><a href="#">Get in touch by email</a></strong>
						</li>
					</ul>
				</div>
			</div>


			<!-- Recent Activity -->
			<div class="col-lg-6 col-md-12">
				<div class="dashboard-list-box with-icons margin-top-20">
					<h4>Recent Activities</h4>
					<ul class="dashboard-packages">
						<li>
							<i class="list-box-icon fa fa-shopping-cart"></i>
							<strong>Views</strong>
							<span>Olawale viewed your profile</span>
						</li>
						<li>
							<i class="list-box-icon fa fa-shopping-cart"></i>
							<strong>Contacts</strong>
							<span>Maryam checked your contact</span>
						</li>
						<li>
							<i class="list-box-icon fa fa-shopping-cart"></i>
							<strong>Jobs</strong>
							<span>Job with Mustapha marked completed</span>
						</li>
					</ul>
				</div>
			</div>

<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
