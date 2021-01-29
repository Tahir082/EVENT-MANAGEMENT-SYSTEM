@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <br>
            <div class="card">
                <div class="card-header">Hi, {{Auth::user()->name}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                      <div class="col-md-12">
                        <br/>
                        <h3>Report Post</h3>
                        <br/>
                        <form method="POST" action="{{action('PostController@report_post', $post->id)}}">
                          @csrf

                          <div class="form-group">


                              <input type="text" name="report" class="form-control" placeholder="Why you dont like this post?"/>

                              <input type="submit" class="form-control" value="Confirm"/>

                          </div>
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
