@extends('layouts.guest')

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar">
	<div class="container">
		<div class="ten columns">
			<span>We've found {{count($collection)}} artisan(s):</span>
			<h2 style="text-transform: capitalize">{{$title}}</h2>
		</div>

		<div class="six columns">
			<a href="{{ route('login') }}#tab2" class="button">Sign up, It’s Free!</a>
		</div>

	</div>
</div>


<!-- Content
================================================== -->
<div class="container">
  @if (count($collection) > 0)
      	<!-- Recent Jobs -->
	<div class="eleven columns">
    <div class="padding-right">
  
      <ul class="resumes-list alternative">
  
        @foreach ($collection as $data)
          <li><a href="view-artisan?userid={{$data->userid}}">
            <img src="@if($data->image) {{url('uploads/'.$data->image)}} @else http://www.gravatar.com/avatar/000000000000000000000000000000007cd7.png?d=mm&amp;s=300 @endif " alt="{{$data->image}}">
            <div class="resumes-list-content">
              <h4>{{$data->name}}</h4>
              
            <span><i class="fa fa-map-marker"></i>{{$data->state}}</span>
              <span><i class="fa fa-clock-o"></i> {{ str_replace("to","-",$data->experience) }} years</span>
              <span title="{{$data->star}}">
                @for ($i = 0; $i < (int)$data->star; $i++)<b class="fa fa-star checked"></b>@endfor @if ((int) $data->star != $data->star)<b class="fa fa-star-half-o checked"></b>@endif	@for ($i = 0; $i < (int)(5 - $data->star); $i++)<b class="fa fa-star"></b>@endfor
              </span>
              <p>{{$data->description}}</p>
  
              <div class="skills">
                @foreach ($data->skills as $skills)
                  <span style="text-transform: capitalize">{{$skills->skill}}</span>
                @endforeach
              </div>
              <div class="clearfix"></div>
  
            </div>
            </a>
            <div class="clearfix"></div>
          </li>
        @endforeach
  
      </ul>

      <div class="clearfix"></div>
  
      <div class="pagination-container">
        {{$collection->links()}}
      </div>
  
    </div>
    </div>
  
  
    <!-- Widgets -->
    <div class="five columns">
  
      <!-- Sort by -->
      <div class="widget">
        <h4>Sort by</h4>
  
        <!-- Select -->
        <select data-placeholder="Choose Category" class="chosen-select-no-single">
          <option selected="selected" value="recent">Relevance</option>
          <option value="">Hourly Rate – Highest First</option>
          <option value="">Hourly Rate – Lowest First</option>
        </select>
  
      </div>
  
      <!-- Skills -->
      <div class="widget">
        <h4>Skills</h4>
  
        <!-- Select -->
        <form action="#" method="get">
          <select data-placeholder="Select Skills" class="chosen-select" multiple>
            <option value="">Adobe Photoshop</option>
            <option value="">PHP</option>
            <option value="">HTML</option>
            <option value="">CSS</option>
            <option value="">JavaScript</option>
            <option value="">jQuery</option>
            <option value="">MySQL</option>
            <option value="">WordPress</option>
          </select>
          <div class="margin-top-15"></div>
          <button class="button">Filter</button>
        </form>
      </div>
  
      <!-- Location -->
      <div class="widget">
        <h4>Location</h4>
        <form action="#" method="get">
          <input type="text" placeholder="State / Province" value=""/>
          <input type="text" placeholder="City" value=""/>
          <button class="button">Filter</button>
        </form>
      </div>
  
  
    </div>
    <!-- Widgets / End -->

  @else

  <div class="eleven columns">
    <div class="padding-right margin-bottom-40">
      No artisans yet in this category.
    </div>
  </div>

  @endif



</div>
@endsection

@section('styles')
    <style>
      .resumes-list.alternative li a p {
        display:block;
      }
      .pagination li {
          width: 42px;
          border-radius: 3px;
          padding: 12px 0;
          border-bottom: none;
          display: inline-block;
          color: #888;
          background-color: #f2f2f2;
          font-weight: 700;
          margin: 0;
          font-size: 14px;
      }
      .pagination li :hover{
        background-color: #26ae61;
        color: #ffffff;
        padding: 12px 17px;
        
      }
      .page-item a{
        color: #888;
        border-radius: 3px;
      }
      .pagination .active {
        background-color: #26ae61;
        color: #ffffff;
      }
      .listing-type{
        color: orange !important;
        border-color: unset !important;
        background-color: unset !important;
        border: unset;
        font-size: 14px;
      }
      .checked{
        color: orange;
        font-size: 14px;
      }
    </style>
@endsection