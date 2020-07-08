@extends('layouts.app')

@section('content')
        <!-- Titlebar -->
        <div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Manage Tasks</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li><li>Manage Tasks</li>
						</ul>
					</nav>
				</div>
			</div>
        </div>
		<!-- Profile -->
		<div class="dashboard-list-box margin-top-0">
			<h4 class="gray">Completed Tasks</h4>
			<div class="dashboard-list-box-static">
                @if(session("error"))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: red">{{ session('error') }}</strong>
                    </span>
                @endif

                @if(session("success"))
                    <span class="invalid-feedback" role="alert">
                        <strong style="color: rgb(0, 128, 117)">{{ session('success') }}</strong>
                    </span>
                @endif
				<div class="row">
                <!-- Table-->
                <div class="col-lg-12 col-md-12">
                    @if (count($data) > 0)
                    <div class="notification notice">
                        View ratings and feedbacks for completed tasks.
                    </div>
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">
                            <!-- Table -->
                            <table class="manage-table resumes responsive-table">
                                <tr>
                                    <th style=" width: 18px;  padding-left: 18px;">S/N</th>
                                    <th><i class="fa fa-user"></i>@if(Auth::user()->type == 4) Vendor @else Artisan @endif</th>
                                    <th><i class="fa fa-gear"></i> Status</th>
                                    <th><i class="fa fa-star"></i> Rating</th>
                                    <th><i class="fa fa-star"></i> Feedback</th>
                                    <th><i class="fa fa-calendar"></i> Date Posted</th>
                                </tr>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td class="title"><a href="{{url("view-artisan?userid=".$item->artisan_id)}}" style="text-transform: capitalize">{{$item->name}}</a></td>
                                        <td>@if($item->status == 1)<span style="margin-right: 10px; font-weight:bold; background-color: #277bff;
                                            padding: 4px 7px;
                                            border-radius: 3px; color:#fff">Open</span>

                                        <a href="#"  class="delete" style="color: #fff;
                                            font-weight: bold;
                                            background-color: #f02929;
                                            padding: 4px 7px;
                                            border-radius: 3px;" data-toggle="modal" data-target="#closeModal{{$key}}"><i class="fa fa-remove"></i> Close Task</a> @else Closed @endif </td>
                                        <td>@if($item->rating)
                                                <i title="{{$item->rating}} stars">
                                                @for ($i = 0; $i < (int)$item->rating; $i++)<span class="fa fa-star checked"></span>@endfor
                                                @if ((int) $item->rating != $item->rating)<span class="fa fa-star-half-o checked"></span>@endif	
                                                @for ($i = 0; $i < (int)(5 - $item->rating); $i++)<span class="fa fa-star"></span>@endfor
                                                </i>
                                            @else 
                                                    No rating.
                                            @endif
                                        </td>
                                        <td>@if($item->feedback)
                                            {{$item->feedback}}
                                            @else 
                                                    No feedback.
                                            @endif
                                        </td>
                                        <td>{{date("M d, Y", strtotime($item->created_at))}}</td>
                                    </tr>
                                   
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @else
                    <div class="notification notice">
                        You have no completed tasks.
                    </div>
                    @endif 
                </div>

			</div>
		</div>
	
@endsection

@section('styles')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
    .dashboard-content {
        z-index: unset !important;
        }
.my-profile label {
	margin-top:15px;
	margin-bottom:0;
}
.edit-profile-photo {
    margin-bottom: 0;
}
.edit-profile-photo img {
    border-radius: 150px;
    max-width: 200px;
	margin:auto;
}
.change-photo-btn {
    display: block;
    position: relative;
    width: unset;
    bottom: 70px;
    margin: auto;
    left: 0;
    max-width: 151px;
}
.checked {
    color: orange;
  }
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $("#star1").click(() => {
            for (let i = 2; i <= 5; i++) {
                $("#star"+i).removeClass("checked") //remove starting from after
            }
            $("#star1").addClass("checked");
            $("#rating").val("1");
        });
        $("#star2").click(() => {
            for (let i = 3; i <= 5; i++) {
                $("#star"+i).removeClass("checked") //remove starting from after
            }
            for (let i = 1; i <= 2; i++) {
                $("#star"+i).addClass("checked") //add
            }
            $("#rating").val("2");
        });
        $("#star3").click(() => {
            for (let i = 4; i <= 5; i++) {
                $("#star"+i).removeClass("checked") //remove starting from after
            }
            for (let i = 1; i <= 3; i++) {
                $("#star"+i).addClass("checked") //add
            }
            $("#rating").val("3");
        });
        $("#star4").click(() => {
            $("#star5").removeClass("checked") //remove starting from after
            for (let i = 1; i <= 4; i++) {
                $("#star"+i).addClass("checked") //add
            }
            $("#rating").val("4");
        });
        $("#star5").click(() => {
            for (let i = 1; i <= 5; i++) {
                $("#star"+i).addClass("checked") //remove starting from after
            }
            $("#rating").val("5");
        });
    });

 </script>

@endsection