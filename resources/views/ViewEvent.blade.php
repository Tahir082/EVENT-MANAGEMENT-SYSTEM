@extends('layouts.main')
@section('content')

@if( $l_event )

<div class="container">
<div class="jumbotron">
	<div class="text-sm-center">
		@foreach($image as $img)

		<img class="img-thumbnail center-block w-25"  src="{{ asset('public/uploads/latest_event/' .$img->image) }}" alt="{{ $l_event->title }}">

		@endforeach
	</div>
	<br>

	<div class="card">
			<div class="card-header"> <h4 class="h4-responsive mt-3"><b>{{ $l_event->title }}</b></h4>
			</div>

			<div class="card-body">
					<p><strong> Description:</strong> </p>
					<p>@lang($l_event->description)</p>
			</div>
	</div>

</div>
</div>

@endif

@if( $up_event )

<div class="container">
<div class="jumbotron">
	<div class="text-sm-center">
		<img class="img-thumbnail center-block w-25"  src="{{ asset('public/uploads/upcoming_event/' .$up_event->image) }}" alt="{{ $up_event->title }}">
	</div>

	<div class="card">
			<div class="card-header"> <h4 class="h4-responsive mt-3"><b>{{ $up_event->title }}</b></h4>
			</div>

			<div class="card-body">
					<p><strong> Description:</strong> </p>
					<p>@lang($up_event->description)</p>
					<a href="{{route('homelogin')}}" class="btn btn-primary"> Register for this event </a>
			</div>
	</div>

</div>
</div>

@endif

@endsection
