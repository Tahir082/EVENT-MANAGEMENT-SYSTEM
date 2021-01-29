@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <br>
          <div class="card">
              <div class="card-header"><strong> You have to Sign in first </strong></div>

              <div class="card-body">
                If you wish to become a member of the club, <br>
                <a href="{{route('homelogin')}}"> Sign in </a> or <a href="{{url('/register')}}"> Sign Up </a>
          </div>
      </div>
      <br>
            <div class="card">
                <div class="card-header"><strong> Users and Recruited Members from Users</strong></div>

                <div class="card-body">
                    <div class= "row">
                      <div class = "col-md-12">
                        <table class="table table-bordered">
                          <tr>
                            <th> Name </th>
                            <th> Email </th>
                            <th> Designation </th>
                          </tr>
                          @foreach($uservariable as $row)
                          <tr>
                            <td> {{$row['name']}}</td>
                            <td> {{$row['email']}}</td>
                            <td> {{$row['job']}}</td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection('content')
