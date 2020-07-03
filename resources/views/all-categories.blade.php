@extends('layouts.guest')

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="photo-bg" style="background-image: url(images/all-categories-photo.jpg);">
	<div class="container">
		<div class="ten columns">
			<h2>All Categories</h2>
		</div>

		<div class="six columns">
			<a href="{{ route('login') }}#tab2" class="button">Sign up, It’s Free!</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div id="categories">
	<!-- Categories Group -->
	<div class="categories-group">
		<div class="container">
			<div class="six columns"><h4>All Artisans</h4></div>
			<div class="five columns">
				<ul>
			@for ($i = 0; $i < (int)count($data)/2; $i++)
				<li><a href="/browse-artisans?skill={{$data[$i]->slug}}">{{$data[$i]->name}}</a></li>
			@endfor
				</ul>
			</div>
			<div class="five columns">
				<ul>
				@for ($i = (int)count($data)/2; $i < count($data); $i++)
					<li><a href="/browse-artisans?skill={{$data[$i]->slug}}">{{$data[$i]->name}}</a></li>
				@endfor
				</ul>
			</div>
		
		</div>
	</div>

</div>

@endsection