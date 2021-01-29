@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center text-success">{{ $post->title }}</h4>
                    <br/>
                    <h4> <strong> {{$post->username}} </strong> says, </br> <strong> [{{$post->userjob}}] </strong> </h4>
                    <p>
                        {{ $post->body }}<br>

                        @if($post->userid==Auth::user()->id)
                        <form method="post" class="delete_form" action="{{action('PostController@delete', [$post->id])}}">
                          @csrf
                          <input type="hidden" name="_method" value="DELETE" />
                          <button type="submit" class="fas fa-trash"> DELETE POST</button>

                        </form>
                        @else
                        <a href="{{action('PostController@report', [$post->id])}}"> Report Post</a>
                        @endif

                    </p>
                    <hr />
                    <h4>Comments</h4>

                    @include('realtime.comments', ['comments' => $post->comments, 'post_id' => $post->id])

                    <hr />
                    <h4>Add comment</h4>
                    <form method="post" action="{{ route('comments') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="post_id" value="{{ $post->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
  $('.delete_form').on('submit', function(){
    if(confirm("Are You sure want to delete this post?"))
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
@endsection
