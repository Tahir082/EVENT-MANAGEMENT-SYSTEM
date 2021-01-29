@extends('layouts.adminapp')

@section('content')
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
                    <div class="row">
                      <div class="col-md-12">
                        <br/>
                        <h3>Update Designation</h3>
                        <br/>
                        <form method="POST" action="{{action('AdminController@update_user', $id)}}">
                          @csrf

                          <div class="form-group">
                            <input type="hidden" name="request" class="form-control" value="NULL"/>

                            <div class="form-group">
                              <input type="submit" class="btn btn-blue" name="Designation" class="form-control" value="User"/>
                              <input type="submit" class="btn btn-green" name="Designation" class="form-control" value="Member"/>
                              <input type="submit" class="btn btn-black" name="Designation" class="form-control" value="Volunteer Coordinator"/>
                              <input type="submit" class="btn btn-black" name="Designation" class="form-control" value="Treasurer"/>
                              <input type="submit" class="btn btn-black" name="Designation" class="form-control" value="Assistant General Secretary"/>
                              <input type="submit" class="btn btn-black" name="Designation" class="form-control" value="General Secretary"/>
                              <input type="submit" class="btn btn-orange" name="Designation" class="form-control" value="Vice President"/>
                              <input type="submit" class="btn btn-orange" name="Designation" class="form-control" value="President"/>
                              <input type="submit" class="btn btn-red" name="Designation" class="form-control" value="Admin"/>

                        </form>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
<br>
</div>
@endsection
