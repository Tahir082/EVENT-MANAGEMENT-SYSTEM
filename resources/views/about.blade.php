@extends('layouts.main')
@section('content')

<div class="container">
@if( !$description->isEmpty() )
@foreach($description as $description)
<div class="card card-cascade">

  <!-- Card image -->
  <div class="view view-cascade overlay">
    <img class="card-img-top w-100" style="height: 450px;" src="{{ asset('public/uploads/description/' .$description->image) }}" alt="{{ $description->title }}">
    <a>
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body card-body-cascade">

    <!-- Title -->
    <h4 class="card-title  text-center"><strong>{{ $description->title }}</strong></h4>
    <!-- Text -->
    <p class="card-text  text-left">{{$description->description }}</p>


  </div>

</div>
@endforeach
@endif


@if( ! $executives->isEmpty() )

	<div class="jumbotron">
		<div class="d-flex justify-content-center">
			<h4 class="font-weight-bold">Executive members</h4>
		</div>
	<div class="row mt-3 mb-3">
@foreach($executives as $executive)
		<div class="col-sm-3">
			<div class="card card-cascade">

			  <!-- Card image -->
			  <div class="view view-cascade overlay">
			    <img class="card-img-top w-100" style="height: 200px;" src="{{ asset('public/uploads/executive/' .$executive->image) }}" alt="{{ $executive->title }}">
			    <a>
			      <div class="mask rgba-white-slight"></div>
			    </a>
			  </div>

			  <!-- Card content -->
			  <div class="card-body card-body-cascade">

			    <!-- Title -->
			    <h4 class="card-title text-left"><strong>{{ $executive->name }}</strong></h4>
			    <!-- Subtitle -->
			    <h6 class="font-weight-bold indigo-text text-left">{{ $executive->title }}</h6>
			    <!-- Text -->

			    <p class="card-text text-left">Student ID: {{ $executive->std_id }}</p>
			  
			    <p class="card-text text-left">Contact: {{ $executive->conatct }}</p>
			    <p class="card-text text-left">Contact: {{ $executive->email }}</p>


			  </div>

			</div>
		</div>
@endforeach
	</div>

	</div>

@endif

</div>

@endsection
