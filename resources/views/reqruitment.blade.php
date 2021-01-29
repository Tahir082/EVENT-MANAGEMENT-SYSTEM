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
          @if(Auth::user()->job!="User")
          <h3>  <strong>You have been promoted already! </strong> </h3>
          <p> <strong> You are acting as <font color="blue"> {{Auth::user()->job}} </font> now.  </strong></p>
          <p> <strong> <font color="green"> Important Note: </font> If you have been promoted as an <font color="red"> ADMIN </font>, please contact with anyone from the copyrights link below for getting your ADMIN ID and Password. </strong> </P>
          @else

            <div class="card">
                <div class="card-header"> <strong> Reqruitment </strong>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <br> For being a member you have to accept the following agreements: <br>
                    1. As you are now a member of the club you are also volunteer of events according to your area of speciality <br>
                    2. You have to be present in club meetings as they are important for knowing about event organizing. <br>
                    3. Feel free to register for participating in many events. <br>
                    4. You are responsible for your own choices. Please note that, no one from the executive or sub-executive panel has forced or pressurized you to become a member. <br>
                    <br>

                </div>
            </div>

          <br>


          <div class="card">
              <div class="card-header"> <strong> Enter your area of speciality. This is required for reqruitment </strong>
              </div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif
                  For Example: Programming, Decoraition, Web Designing, Graphics Designing, Singing, Dancing etc. <br>
                  You can add multiple options by using comma (,) <br><br>
                  <form method="POST" action="{{action('HomeController@reqruitment', $id=Auth::user()->id)}}">
                    @csrf

                    <div class="form-group">
                      <label class="form-check-label" for="contact">
                          {{ __('Your Speciality') }}
                      </label>
                      <input type="text" name="speciality" class="form-control" value="{{$user->speciality}}" placeholder="Enter area of speciality"/>
                      <label class="form-check-label" for="contact">
                          {{ __('Your Contact Number') }}
                      </label>
                      <input type="text" name="contact" class="form-control" value="{{$user->contact}}" placeholder="Enter Contact Number"/>
                        <input class="form-group" type="checkbox" name="request" id="request" value="YES">
                        <label class="form-check-label" for="request">
                            {{ __('I have read the agreements and I wish to Confirm Request') }}
                        </label>
                        <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Confirm"/>
                  </form>
                </div>
              </div>
            </div>
        </div>
        <br>
        <br>
        @endif

          </div>
      </div>


          <br>

        </div>
    </div>
</div>
@endsection
