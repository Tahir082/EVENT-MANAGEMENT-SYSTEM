@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
              <div class="card-header"> Hi, {{Auth::user()->name}}
              </div>
          </div>
          <br>
          <br>
          <div class="container">
          	<div class="row justify-content-center">
                    <div class= "row">
                        <div class = "col">
                                  <br/>
                                  <h3 align="center"><b> Your Event Registration Status</b></h3>
                                  <br/>
                                  <table class="table table-bordered">
                                    <tr>
                                      <th> Event Name </th>
                                      <th> Registration Token </th>
          														<th> Participaing in </th>
                                      <th> Institution </th>
                                      <th> Payment </th>
                                    </tr>

                                    @foreach($check as $row)
                                    <tr>
                                      <td> {{$row['event_name']}}</td>
                                      <td> {{$row['id']}}</td>
                                      <td> {{$row['participate']}}</td>
                                      <td> {{$row['university']}}</td>
          														<td> {{$row['payment']}} </td>
                                    </tr>
                                    @endforeach
                                  </table>
                                  <div class="row justify-content-center">
                                  <b>Note: <font color="red">If you have registered for an event already, do not register for the same event again. </font> </b>
                                </div>
                              </div>
          									</div>
          								</div>
          							</div>

                        <br>
                        <br>

            <div class="card">
                <div class="card-header"> <strong> Event Registration </strong>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if( !$upcoming_event->isEmpty() )
              			<div class="col-lg-8">
              				<div class="card-body">

              					<h5 class="h5-responsive"><b>Upcoming Events</b></h5>

              					<div class="list-group mt-3 mb-3">
              					@foreach($upcoming_event as $up_event)

              						<a href="{{ action('HomeController@event_registration', [$id=Auth::user()->id, $id2=$up_event->id] )}}" class="list-group-item list-group-item-action">@lang( $up_event->title )</a>

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
