@extends('layouts.adminapp')
@section('content')
<div class="grey lighten-5">
<div class="container pt-3 mt-3 pb-3 mb-3 d-flex justify-content-center">
<div class="col-sm-4">
	<div class="list-group text-sm-center">
					<!--Dropdown-->
			<div class="dropdown">

			  <!--Trigger-->
			  <a class="list-group-item list-group-item-action btn stylish-color dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
			    aria-haspopup="true" aria-expanded="false">Home page</a>


			  <!--Menu-->
			  <div class="dropdown-menu blue-grey lighten-5 border border-dark-2">
			    <a class="dropdown-item border border-dark-2" href="{{ route('slider')}}">Slider</a>
			    <a class="dropdown-item border border-dark-2" href="{{ route('latest_event') }}">Our Events</a>
			    <a class="dropdown-item border border-dark-2" href="{{ route('upcoming_event') }}">Upcoming Event</a>
			  </div>
			</div>
			<!--/Dropdown-->

					<!--Dropdown-->
			<div class="dropdown">

			  <!--Trigger-->
			  <a class="list-group-item list-group-item-action btn stylish-color dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown"
			    aria-haspopup="true" aria-expanded="false">About</a>


			  <!--Menu-->
			  <div class="dropdown-menu blue-grey lighten-5 border border-dark-2">
					<a class="dropdown-item border border-dark-2" href="{{ route('description')}}">Description</a>
			    <a class="dropdown-item border border-dark-2" href="{{ route('executive')}}">Executive Members</a>
			  </div>
			</div>
			<!--/Dropdown-->

	</div>
</div>
</div>
</div>


@endsection
