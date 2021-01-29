@extends('layouts.main')
@section('content')

<div class="grey lighten-5 text-black">
<!--slider section-->
	<div class="container">
<!--Carousel Wrapper-->

@if( ! $Sliders->isEmpty() )
		<div id="carousel-example-2" class="carousel slide carousel-fade" data-ride="carousel">
  <!--Indicators-->
  			<ol class="carousel-indicators">
    			@foreach( $Sliders as $slider )
      			<li data-target="#carousel-example-2" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
   				@endforeach
  			</ol>
  <!--/.Indicators-->
  <!--Slides-->
  	<div class="carousel-inner" role="listbox">
  		@foreach( $Sliders as $slider )
       		<div class="carousel-item {{ $loop->first ? 'active' : '' }}">
       			<div class="view">
           		<img class="center-block w-100" style="height: 450px;" src="{{ asset('public/uploads/slider/' .$slider->image) }}" alt="{{ $slider->title }}">
           		<div class="mask rgba-black-light"></div>
      			</div>
              	<div class="carousel-caption d-none d-md-block">
                 	<h3 class="h3-responsive">{{ $slider->title }}</h3>
              	</div>
       		</div>
    	@endforeach
  	</div>
  <!--/.Slides-->
  <!--Controls-->
  		<a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
    		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    		<span class="sr-only">Previous</span>
  		</a>
  		<a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
    		<span class="carousel-control-next-icon" aria-hidden="true"></span>
    		<span class="sr-only">Next</span>
  		</a>
  <!--/.Controls-->
		</div>
<!--/.Carousel Wrapper-->
  @endif
	</div>
<!-- END slider section-->

<br>


<!-- Content Section -->


	<div class="container-fluid">

		<div class="row">
			@if( ! $latest_event->isEmpty() )
			<div class="col-lg-8">
				<div class="card-body">

					<h5 class="h5-responsive"><b>Our Successful Events </b></h5>

					<div class="list-group mt-3 mb-3">
					@foreach($latest_event as $l_event)

						<a href="{{ route('view_l_event',[$l_event->id]) }}" class="list-group-item list-group-item-action">@lang( $l_event->title )</a>

					@endforeach
					</div>

				</div>
			</div>
			@endif
			@if( ! $upcoming_event->isEmpty() )
			<div class="col-lg-4">
				<div class="card-body">
					<h5 class="h5-responsive"><b>Upcoming Event</b></h5>

					<div class="list-group mt-3 mb-3">
					@foreach( $upcoming_event as $up_event )

						<a href="{{ route('view_up_event',[$up_event->id]) }}" class="list-group-item list-group-item-action">@lang( $up_event->title )</a>

					@endforeach
					</div>
				</div>
			</div>
			@endif
		</div>

	</div>

<!-- END Content Section -->

</div>
<br>

@endsection
