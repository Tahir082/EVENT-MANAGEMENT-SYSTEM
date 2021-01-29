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
          <br>
            <div class="card">
                <div class="card-header">Admin Panel: Hi, {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
										<p>Tap 'YES' or 'NO' in Payment Confirmation field with caution</p>
									</div>
								</div>
								<br>
								<br>

<div class="container">
	<div class="row justify-content-center">
          <div class= "row">
              <div class = "col">
                        <br/>
                        <h3 align="center"><b> Event Data </b></h3>
                        <br/>
                        <table class="table table-bordered">
                          <tr>
                            <th> Event Name </th>
                            <th> Particpators </th>
														<th> Participaing in </th>
                            <th> Email </th>
                            <th> Contact </th>
														<th> Institution </th>
														<th> Regsitered On </th>
                            <th> Payment </th>
                            <th> Confirm Payment </th>
                          </tr>

                          @foreach($latest_event as $row)
                          <tr>
                            <td> {{$row['event_name']}}</td>
                            <td> {{$row['user_name']}}</td>
                            <td> {{$row['participate']}}</td>
                            <td> {{$row['user_email']}}</td>
														<td> {{$row['user_contact']}} </td>
														<td> {{$row['university']}} </td>
														<td> {{$row['created_at']}} </td>
                            <td>
														<strong> <font color="red"> {{$row['payment']}} </font> <strong>
														</td>
                            <td>
															<form method="POST" action="{{action('AdminController@update_user_registrations', $row['id'])}}">
		                       @csrf
		                            <input type="hidden" name="payment" id="payment" value="YES"/>
		                            <input type="submit" class="btn btn-primary" value="YES"/>
		                        </form>
														<form method="POST" action="{{action('AdminController@update_user_registrations', $row['id'])}}">
												 @csrf
															<input type="hidden" name="payment" id="payment" value="NO"/>
															<input type="submit" class="btn btn-red" value="NO"/>
													</form>
													</td>
                          </tr>
                          @endforeach
                        </table>
                    </div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>



@endsection
