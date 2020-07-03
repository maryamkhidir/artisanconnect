@extends('layouts.app')

@section('content')
        <!-- Titlebar -->
        <div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>My Profile</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li><li>My Profile</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<!-- Profile -->
		<div class="dashboard-list-box margin-top-0">
			<h4 class="gray">Edit Profile</h4>

			<div class="dashboard-list-box-static">
				@if(session('error'))
					<span class="invalid-feedback" role="alert">
						<strong style="color: red">{{ session('error') }}</strong>
					</span>
				@endif

				@if(session("success"))
					<span class="invalid-feedback" role="alert">
						<strong style="color: rgb(0, 128, 117)">{{ session('success') }}</strong>
					</span>
				@endif
				
				<form action="{{ route("update_profile") }}" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						@csrf
						<!-- Avatar -->
						<div class="edit-profile-photo">
							<img src="@if($data->image) {{url('uploads/'.$data->image)}} @else http://www.gravatar.com/avatar/000000000000000000000000000000007cd7.png?d=mm&amp;s=300 @endif " alt="{{$data->image}}">
							<div class="change-photo-btn">
								<div class="photoUpload">
									<span><i class="fa fa-upload"></i> @if($data->image) Change Photo @else Upload Photo @endif</span>
									<input type="file" name="image" class="upload" accept="image/png, image/jpeg" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<!-- Details -->
						<div class="my-profile">

							<label>Your Name</label>
							<input value="{{$data->name}}" name="name" type="text">

							<label>Phone</label>
							<input value="{{$data->phone}}" name="phone" disabled type="text">

							<label>Email</label>
							<input value="{{$data->email}}" name="email" type="text">

							<label>Bio</label>
							<textarea name="description" id="notes" style="height: 90px;" placeholder="Enter a short description of yourself!">{{$data->description}}</textarea>

						</div>

					</div>
					<div class="col-md-6">
						<!-- Change Password -->
						<div class="my-profile">
							<label>Address</label>
							<input type="text" name="address" value="{{$data->address}}">

							<label>Experience</label>
							<select
								name="experience"
								style="height: 47px;"
								required
							>
							<option value="">- Select -</option>
							<option value="0to3" @if($data->experience == '0to3') selected @endif >0 - 3 years</option>
							<option value="3to5" @if($data->experience == '3to5') selected @endif >3 - 5 years</option>
							<option value="5to10" @if($data->experience == '5to10') selected @endif >5 - 10 years</option>
							</select>

							<label>Category</label>
							<select
							name="type"
							style="height: 47px;"
							disabled
							>
							<option value="">- Select -</option>
							<option value="4" @if($data->type == '4') selected @endif >Artisan</option>
							<option value="3" @if($data->type == '3') selected @endif >Vendor</option>

							</select>

							<label>Identification</label>
							<div class="change-photo-btn" style="margin-bottom: 10px;
							top: 5px;
							max-width: unset;
							display: inline-block;
							border: 1px solid #e0e0e0;">
								<div class="photoUpload">
									<span><i class="fa fa-upload"></i>Upload ID Card</span>
									<input type="file" name="identification" class="upload" accept="image/png, image/jpeg" />
								</div>
							</div>
							<span>{{$data->identification}}</span>
							<br/>

							<div class="change-photo-btn" style="bottom: 0;
							top: 5px;
							max-width: unset;
							display: inline-block;
							border: 1px solid #e0e0e0;">
								<div class="photoUpload">
									<span><i class="fa fa-upload"></i>Add Utility Bill</span>
									<input type="file" name="utility" class="upload" accept="image/png, image/jpeg" />
								</div>
							</div>
							<span>{{$data->utility}}</span>
						</div>
					</div>
				</div>
				<input type="submit" name="update_profile" value="Save Changes" class="button margin-top-15"/>
				</form>
			</div>
		</div>
		<div class="row">

			<!-- Change Password -->
			<div class="col-md-12">
				<div class="dashboard-list-box margin-top-30">
					<h4 class="gray">Change Password</h4>
					<div class="dashboard-list-box-static">
						@if(session('error'))
							<span class="invalid-feedback" role="alert">
								<strong style="color: red">{{ session('error') }}</strong>
							</span>
						@endif

						@if(session("success"))
							<span class="invalid-feedback" role="alert">
								<strong style="color: rgb(0, 128, 117)">{{ session('success') }}</strong>
							</span>
						@endif

						<form action="{{ route("update_profile") }}" method="post">
							@csrf
						<!-- Change Password -->
						<div class="my-profile row">
							<div class="col-md-4">
								<label class="margin-top-5">Username</label>
								<input type="text" name="phone" value="{{$data->phone}}" disabled>
							</div>

							<div class="col-md-4">
								<label class="margin-top-5">Password</label>
								<input type="password" name="password">
								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong style="color: red">{{ $message }}</strong>
								</span>
								@enderror
							</div>
							
							<div class="col-md-4">
								<label class="margin-top-5">Confirm Password</label>
								<input type="password" name="password_confirmation">
							</div>

						</div>
						<input type="submit" name="update_password" value="Change Password" class="button margin-top-15"/>
					</form>

					</div>
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

@section('styles')
<style>
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
</style>
@endsection