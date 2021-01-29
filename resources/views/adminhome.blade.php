@extends('layouts.adminapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <strong> Hi, {{Auth::user()->name}} </strong> </div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as an <strong> ADMIN </strong>

                </div>
            </div>
            <br>
            <br>
            <div class="card">
                <div class="card-header"> <strong> Edit User Data </strong> </div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ url('/editdata') }}" class="btn btn-primary"><i class="far fa-edit"> Edit Users</i></a>

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header"> <strong> User Event Registration Records </strong> </div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{ route('edit_records_one') }}" class="btn btn-primary"><i class="far fa-edit"> Show user event registration records</i></a>

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header"> <strong> Edit Events and Much More!!</strong> </div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Entering the following link you will be able to, edit everything about this web application <br>

                    <a href="{{ route('dashboard')}}" class="btn btn-danger"> <i class="far fa-edit"> EDIT PAGE (Enter with Caution)</i></a>

                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header"> <strong> Delete posts</strong> </div>
                  <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Entering the following link you will be able to delete posts from users <br>

                    <a href="{{ route('edit_posts')}}" class="btn btn-danger"> <i class="far fa-edit"> EDIT POSTS (Enter with Caution)</i></a>

                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>
@endsection
