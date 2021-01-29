@extends('layouts.app')

@section('content')
<br>
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
        <div class="col-md-12">
            <a href="{{ route('create') }}" class="btn btn-success" style="float: right"> <h4> <strong> Hi, {{ Auth::user()->name }} </strong> </h4><br><h5> <strong> Click Here </strong> to post something</h5> </a>
            <table class="table table-bordered">
                <thead>
                  <th width="250px">  <strong>  User </strong> </th>
                  <th> <strong>  All Posts  </strong> </th>
                  <th width="150px">  <strong> Action </strong> </th>
                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                  <td>{{ $post->username }} [{{$post->userjob}}]</td>
                    <td>{{ $post->title }}</td>
                    <td>
                        <a href="{{ route('show', $post->id) }}" class="btn btn-primary">View Post</a>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div>
    </div>
		<br>
</div>
</div>
<br>
</div>
@endsection
