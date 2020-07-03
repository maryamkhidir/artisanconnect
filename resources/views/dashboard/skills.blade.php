@extends('layouts.app')

@section('content')
        <!-- Titlebar -->
        <div id="titlebar">
			<div class="row">
				<div class="col-md-12">
					<h2>Manage Skills</h2>
					<!-- Breadcrumbs -->
					<nav id="breadcrumbs">
						<ul>
							<li><a href="#">Home</a></li>
							<li>Dashboard</li><li>Manage Skills</li>
						</ul>
					</nav>
				</div>
			</div>
        </div>
		<!-- Profile -->
		<div class="dashboard-list-box margin-top-0">
			<h4 class="gray">Saved Skills</h4>
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
                        Your skills can be edited or removed below.
                    </div>
                    <div class="dashboard-list-box margin-top-30">
                        <div class="dashboard-list-box-content">
                            <!-- Table -->
                            <table class="manage-table resumes responsive-table">
                                <tr>
                                    <th style=" width: 18px;  padding-left: 18px;">S/N</th>
                                    <th><i class="fa fa-gear"></i> Skill</th>
                                    <th><i class="fa fa-image"></i> Image1</th>
                                    <th><i class="fa fa-image"></i> Image2</th>
                                    <th><i class="fa fa-calendar"></i> Date Posted</th>
                                    <th></th>
                                </tr>
                                @foreach ($data as $key => $item)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td class="title"><a href="#" style="text-transform: capitalize">{{$item->skill}}</a></td>
                                        <td><img src="@if($item->image1) {{url('uploads/'.$item->image1)}} @endif " alt="{{$item->image1}}" style="width: 100px"></td>
                                        <td><img src="@if($item->image2) {{url('uploads/'.$item->image2)}} @endif " alt="{{$item->image2}}" style="width: 100px"></td>
                                        <td>{{date_format($item->created_at,"M d, Y")}}</td>
                                        <td class="action">
                                        <a href="#" data-toggle="modal" data-target="#editModal{{$key}}"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="#" class="delete"data-toggle="modal" data-target="#deleteModal{{$key}}"><i class="fa fa-remove"></i> Delete</a>
                                        </td>
                                    </tr>
                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{$key}}" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route("edit_skill") }}" id="form" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Delete?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" value="{{$item->skill}}" name="skill" />
                                                    Are you sure you want to delete <strong>{{$item->skill}}</strong> skill?
                                                </div>
                                                <div class="modal-footer">
                                                <input type="submit" value="Yes" name="delete_skill" style="background-color: #f02929" class="button">
                                                <button type="button" class="button" data-dismiss="modal" aria-label="Close">No</button>
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editModal{{$key}}" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route("edit_skill") }}" id="form" method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" value="{{$item->skill}}" name="skill" />
                                                    <label class="margin-top-0"><strong>Skill</strong></label>
                                                    <div class="chosen-container chosen-container-multi" style="width: 100%;" title="">
                                                    <ul class="chosen-choices">
                                                        <li class="search-choice" style="padding-right: 8px"><span>{{$item->skill}}</span></li>
                                                    </ul>
                                                    </div>
                                                    <label class="margin-top-20" style="display: block"><strong>Image1 </strong></label>
                                                    <label class="upload-btn margin-top-0 margin-bottom-0" style="color: #fff">
                                                        <input type="file" id="file1{{$key}}" name="image1" accept="image/png, image/jpeg">
                                                        <i class="fa fa-upload"></i> Browse
                                                    </label>

                                                    <span class="fake-input margin-bottom-0" id="filename1{{$key}}">@if($item->image1){{$item->image1}} @else No image selected @endif</span>

                                                    <label class="margin-top-20" style="display: block"><strong>Image2 </strong></label>
                                                    <label class="upload-btn margin-top-0 margin-bottom-0" style="color: #fff">
                                                        <input type="file" id="file2{{$key}}" name="image2" accept="image/png, image/jpeg">
                                                        <i class="fa fa-upload"></i> Browse
                                                    </label>
                                                    <span class="fake-input margin-bottom-0" id="filename2{{$key}}">@if($item->image2){{$item->image2}} @else No image selected @endif</span>
                                                </div>
                                                <div class="modal-footer">
                                                <input type="submit" value="Save Changes" class="button">
                                                </div>
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    @else
                    <div class="notification notice">
                        You have no saved skills.
                    </div>
                    @endif 
                    <a href="{{url('dashboard/add_skills')}}" class="button margin-top-30">Add Skill</a>
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
</style>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    var phpdata = '<?php echo $data ?>';
    var data = $.parseJSON(phpdata);
    console.log(typeof(data))

    data.forEach((element, index) => {
        var $file = $("#file1"+index);
        var $file2 = $("#file2"+index);
        $file.change(function(){
          let filename = $file[0].files[0].name
          console.log(filename)
          if(filename !== ""){
            $("#filename1"+index).html(filename);
          }else{
            $("#filename1"+index).html("No file selected");
          }
       });

       $file2.change(function(){
          let filename2 = $file2[0].files[0].name
          console.log(filename2)
          if(filename2 !== ""){
            $("#filename2"+index).html(filename2);
          }else{
            $("#filename2"+index).html("No file selected");
          }
       });
    });

 </script>

@endsection