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
								<div class="row justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

								</div>
							</div>
								<br>
								<br>


									<div class="row justify-content-center">
										<h3> User Data </h3>
                    <div class= "row">
                      <div class = "col-md-12">
                        <table class="table table-bordered">
                          <tr>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Designation </th>
                            <th> Speciality </th>
                            <th> Request </th>
                            <th> Promote/ Demote </th>
                            <th> BAN (click with CAUTION!!)</th>
                          </tr>
                          @foreach($uservar as $row)
                          <tr>
                            <td> {{$row['name']}}</td>
                            <td> {{$row['email']}}</td>
                            <td> {{$row['job']}}</td>
                            <td> {{$row['speciality']}}</td>
                            <td> {{$row['request']}}</td>
                            <td> <button type="submit" class="btn btn-primary"> <a href="{{action('AdminController@edituserjobdata', $row['id'])}}"> <font color="white"> Designation </font> </a> </button> </td>
                            <td>
															<form method="post" class="delete_form" action="{{action('AdminController@delete_user', $row['id'])}}">
																@csrf
																<input type="hidden" name="_method" value="DELETE" />
																<button type="submit" class="btn btn-red"> DELETE </button>

															</form>
														</td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                    </div>
										<script>
										$(document).ready(function(){
											$('.delete_form').on('submit', function(){
												if(confirm("Are You sure want to delete this user?"))
												{
													return true;
												}
												else
												{
													return false;
												}

											});
										});

										</script>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<br>
</div>
</div>
@endsection
