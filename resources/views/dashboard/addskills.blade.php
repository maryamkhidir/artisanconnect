@extends('layouts.app')

@section('content')
        <!-- Titlebar -->
        <div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Add Skills</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li><li>Add Skills</li>
						</ul>
					</nav>
				</div>
			</div>
        </div>

        <!-- Profile -->
		<div class="dashboard-list-box margin-top-0">
			<h4 class="gray">Add Skills</h4>

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
				
				<form action="{{ route("create_skill") }}" id="form" method="post" enctype="multipart/form-data">
				<div class="row">
          @csrf
					<div class="col-md-6 margin-bottom-20">
              <div class="my-profile">
							<label class="margin-top-0">Select Skills</label>
                  <select data-placeholder="Select Skills" class="chosen-select" multiple name="skills[]" required >
										<option value="">- Select -</option>
										@foreach ($data as $item)
												<option value="{{$item->slug}}">{{$item->name}}</option>
										@endforeach
							   </select>
							@error('skills')
							<span class="invalid-feedback" role="alert">
								<strong style="color: red">{{ $message }}</strong>
							</span>
							@enderror
							<label>Images <span style="font-weight: normal">(max 2 images)</span></label>
              <label class="upload-btn margin-top-0 margin-bottom-0" style="color: #fff">
							  <input type="file" name="images[]" multiple accept="image/png, image/jpeg">
							  <i class="fa fa-upload"></i> Browse
							</label>
              <span class="fake-input margin-bottom-0" id="filename">No file selected</span>
							<span id="fileerror" class="margin-top-0" style="color: red; font-size:12px; font-weight:600"></span>			
							@error('images')
							<span class="invalid-feedback" role="alert">
								<strong style="color: red">{{ $message }}</strong>
							</span>
							@enderror
						</div>
                    </div>
				</div>
				<input type="submit" name="update_profile" value="Save Changes" class="button margin-top-15"/>
				</form>
			</div>
		</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
       $("input[type = 'file']").change(function(){
          var $fileUpload = $("input[type='file']");
          let filenames = ""
          for (let i = 0; i < $fileUpload[0].files.length; i++) {
              filenames = filenames + $fileUpload[0].files[i].name + ", ";
          }
          if (parseInt($fileUpload[0].files.length) > 0){
            $("#filename").html(filenames);
          }else{
            $("#filename").html("No file selected");
          }

          if (parseInt($fileUpload.get(0).files.length) > 2){
             $("#fileerror").html("You are only allowed to upload a maximum of 2 images");
          }else{
            $("#fileerror").html("");
          }
       });

    });

 </script>
@endsection