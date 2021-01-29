@extends('layouts.app')

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
                <div class="card-header"> <strong> Have Question or something on your mind? </strong>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <strong> <a href="{{ route('index') }}">Post Here</a> </strong>
                </div>
            </div>
            <br>

            <div class="card">
                <div class="card-header"> <strong> Register for an Event </strong>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Want to register for an Event?
                    <a href="{{action('HomeController@user_event_registration', $id=Auth::user()->id)}}"> Click here<a/>
                </div>
            </div>
            <br>

            <div class="card">
                <div class="card-header"> <strong> Recruitment </strong>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in and posting as <strong> {{Auth::user()->job}} </strong> for now. <br>
                    <a href="{{action('HomeController@userreqruitment', $id=Auth::user()->id)}}"> Request for reqruitment <a/>

                </div>
            </div>
        </div>
    </div>
</div>
<br>
</div>
</div>
@endsection
