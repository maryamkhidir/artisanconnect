@extends('layouts.guest')

@section('content')
  <!-- Titlebar
================================================== -->
<div id="titlebar" class="resume">
	<div class="container">
		<div class="ten columns">
			<div class="resume-titlebar">
				<img src="@if($user->image) {{url('uploads/'.$user->image)}} @else http://www.gravatar.com/avatar/000000000000000000000000000000007cd7.png?d=mm&amp;s=300 @endif " alt="{{$user->image}}">
				<div class="resumes-list-content">
					<h4>{{$user->name}}</h4>
          <span class="icons"><i class="fa fa-map-marker"></i>{{$user->address}}, {{$user->state}}</span>
          <span><i class="fa fa-clock-o"></i> {{ str_replace("to","-",$user->experience) }} years</span>
					<span class="icons"><a href="#"><i class="fa fa-phone"></i><span id="userphone" >[phone protected]</span></a></span>
					<span class="icons"><a href="#"><i class="fa fa-envelope"></i><span id="useremail" class="__cf_email__" >[email&#160;protected]</span></a></span>
					<div class="skills">
            @foreach ($skills as $skill)
              <span style="text-transform: capitalize">{{$skill->skill}}</span>
            @endforeach
					</div>
					<div class="clearfix"></div>

				</div>
			</div>
		</div>

		<div class="six columns">
			<div class="two-buttons">

				<a href="#" id="view-contact" class="button"><i class="fa fa-envelope"></i> View Contact</a>

				{{-- <div id="small-dialog" class="zoom-anim-dialog mfp-hide apply-popup">
					<div class="small-dialog-headline">
						<h2>Send Message to John Doe</h2>
					</div>

					<div class="small-dialog-content">
						<form action="#" method="get" >
							<input type="text" placeholder="Full Name" value=""/>
							<input type="text" placeholder="Email Address" value=""/>
							<textarea placeholder="Message"></textarea>

							<button class="send">Send Application</button>
						</form>
					</div>
					
				</div> --}}
				<a href="#" class="button dark"><i class="fa fa-star"></i> Bookmark This Artisan</a>


			</div>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container margin-bottom-30">
	<!-- Recent Jobs -->
	<div class="eight columns">
	<div class="padding-right">

		<h3 class="margin-bottom-15">About Me</h3>

		<p class="margin-reset">
      {{$user->description}}
    </p>

		<br>

	</div>
	</div>


	<!-- Widgets -->
	<div class="eight columns  margin-bottom-30">

    <h3>Ratings</h3>
    <div title="{{$user->star}}">
        @for ($i = 0; $i < (int)$user->star; $i++)<span class="fa fa-star checked"></span>@endfor
        @if ((int) $user->star != $user->star)<span class="fa fa-star-half-o checked"></span>@endif	
    </div>

    <h3 class="margin-bottom-5 margin-top-20">Experience</h3>
    <div class="skills margin-top-0">
      <span><i class="fa fa-clock-o"></i> {{ str_replace("to","-",$user->experience) }} years</span>
    </div><br>

    <h3 class="margin-bottom-5 margin-top-20">Skills</h3>
    <div class="skills margin-top-0">
      @foreach ($skills as $skill)
        <span style="text-transform: capitalize">{{$skill->skill}}</span>
      @endforeach
    </div>


  </div>
  <div class="sixteen columns">
    <div class="padding-right">

      <h3 class="margin-bottom-15">Portfolio</h3>
      <div class="aligner">
        <div class="container">
          <div class="owl-carousel owl-theme">
            @foreach ($skills as $skill)
              @if($skill->image1) 
              <div class="item">
                <a href="{{url('uploads/'.$skill->image1)}}" data-lightbox="gallery">
                  <img src="{{url('uploads/'.$skill->image1)}}" class="cover" alt="{{$skill->image1}}" style="height: 150px;">
                </a>
              </div>
              @endif
              @if($skill->image2) 
              <div class="item">
                <a href="{{url('uploads/'.$skill->image2)}}" data-lightbox="gallery">
                  <img src="{{url('uploads/'.$skill->image2)}}" class="cover" alt="{{$skill->image2}}" style="height: 150px;">
                </a>
              </div>
              @endif
            @endforeach            
          </div>
        </div>
        </div>
    </div>
  </div>

</div>
@endsection

@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
  <script>
    $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    startPosition: 2,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      //If user is logged in, dislay the email and phone number. Else take to login page.
      var authid = '<?php if(Auth::user()) echo Auth::user()->id; else echo ""; ?>'
      var email = '<?php echo $user->email; ?>'
      var phone = '<?php echo $user->phone; ?>'
      console.log(authid);
  
      $('#view-contact').click(() => {
        if(authid === ""){
          alert("Please log in to view contact");//not logged
          window.location.href = "/login";
        }else{
          $('#userphone').html(phone);
          $('#useremail').html(email);
        }
      })
  
        /* $('#submit').click(function(e){
          e.preventDefault();
  
  
          var name = $("#name").val();
          var email = $("#email").val();
          var msg_subject = $("#msg_subject").val();
          var message = $("#message").val();
  
  
          $.ajax({
              type: "POST",
              url: "/formProcess.php",
              dataType: "json",
              data: {name:name, email:email, msg_subject:msg_subject, message:message},
              success : function(data){
                  if (data.code == "200"){
                      alert("Success: " +data.msg);
                  } else {
                      $(".display-error").html("<ul>"+data.msg+"</ul>");
                      $(".display-error").css("display","block");
                  }
              }
          });
  
  
        }); */
    });
  </script>
  
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">

<style>
  .sticky-header.cloned {
    z-index: 9998;
  }
  .checked {
    color: orange;
  }
  .aligner {
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .cover {
    object-fit: cover;
   /*  width: 50px; */
    height: 150px;
  }
</style>
@endsection

