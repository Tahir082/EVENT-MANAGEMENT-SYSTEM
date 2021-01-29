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
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <th width="250px"> <strong>  User </strong> </th>
                    <th> <strong>  All Posts  </strong> </th>
                    <th>  <strong> Report </strong> </th>
                    <th width="150px"> <strong> Action </strong> </th>

                </thead>
                <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->username }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->report }}</td>
                    <td>
												<form method="post" class="delete_form" action="{{action('AdminController@delete_post', $post['id'])}}">
													@csrf
													<input type="hidden" name="_method" value="DELETE" />
													<button type="submit" class="fas fa-trash" color="red"> DELETE </button>

												</form>
                    </td>
                </tr>
                @endforeach
                </tbody>

            </table>
        </div><script>
        $(document).ready(function(){
          $('.delete_form').on('submit', function(){
            if(confirm("Are You sure want to delete this Post?"))
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
@endsection
