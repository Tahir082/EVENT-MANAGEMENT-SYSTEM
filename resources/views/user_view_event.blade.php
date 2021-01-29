@extends('layouts.app')
@section('content')


@if( $up_event )

<div class="container">
<div class="jumbotron">
	<div class="text-sm-center">
		@foreach($image as $img)

		<img class="img-thumbnail center-block w-25"  src="{{ asset('public/uploads/latest_event/' .$img->image) }}" alt="{{ $up_event->title }}">

		@endforeach
	</div>
	<br>

	<div class="card">
			<div class="card-header"> <h4 class="h4-responsive mt-3"><b>{{ $up_event->title }}</b></h4>
			</div>

			<div class="card-body">
					<p><strong> Description:</strong> </p>
					<p>@lang($up_event->description)</p>
					<div class="card">
              <div class="card-header"> <strong> Registration for selected event </strong>
              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

									<p> We will SMS you to the given contact number for online payment. Also, you can visit booth at University.</P>

                  <form method="POST" action="{{action('HomeController@register_for_event', $id=Auth::user()->id)}}">
                    @csrf

                    <div class="form-group">
											<label class="form-check-label" for="contact">
												<b> {{ __('University/ School/ College') }} </b>
											</label>
                      <input type="text" name="university" class="form-control" placeholder="Institution name"/>
											<label class="form-check-label" for="university">
												<b> {{ __('Enter Contact Number') }} </b>
											</label>
                      <input type="text" name="contact" class="form-control" placeholder="Contact Number"/>
											<label class="form-check-label" for="participating">
													<b> {{ __('Participating for') }} </b>
											</label>
											<input type="text" name="participating" class="form-control" placeholder="Participating For"/>

											<input type="hidden" name="event_name" class="form-control" value="{{$up_event->title}}"/>
											<input type="hidden" name="competing_event" class="form-control" value="{{$up_event->title}}"/>
											<input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}"/>
											<input type="hidden" name="user_name" class="form-control" value="{{Auth::user()->name}}"/>
											<input type="hidden" name="user_email" class="form-control" value="{{Auth::user()->email}}"/>
											<input type="hidden" name="payment" class="form-control" value="NULL"/>
											<input type="hidden" name="event_id" class="form-control" value="{{$up_event->id}}"/>
											<input type="hidden" name="registration_id" class="form-control" value="{{Auth::user()->id}}"/>

                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Confirm"/>
                  </form>
						</div>
				</div>
			</div>
	</div>

</div>
</div>

@endif
</div>
</div>




@endsection
