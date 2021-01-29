@extends('layouts.adminapp')

@section('content')
<div class="container">
	<div class="card">


		 @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>
            @endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header"> Hi, {{Auth::user()->name}}
              </div>
          </div>
          <br>
          <br>

            <div class="card">
                <div class="card-header"> <strong> Show User Registration Data for </strong>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if( !$latest_event->isEmpty() )
              			<div class="col-lg-8">
              				<div class="card-body">

              					<h5 class="h5-responsive"><b>Select Event</b></h5>

              					<div class="list-group mt-3 mb-3">
              					@foreach($latest_event as $l_event)

              						<a href="{{ action('AdminController@view_user_event_registrations', [$l_event->id] )}}" class="list-group-item list-group-item-action">@lang( $l_event->title )</a>

              					@endforeach
              					</div>

              				</div>
              			</div>
              			@endif

                </div>
            </div>

          <br>
        <br>

          </div>
      </div>


          <br>

        </div>
    </div>
</div>
@endsection
