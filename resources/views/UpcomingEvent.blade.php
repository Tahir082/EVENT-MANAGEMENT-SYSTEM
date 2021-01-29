@extends('layouts.adminapp')
@section('content')

<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>

<div class="container">
	<div class="card">

		 @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>
            @endif

		@if (count($errors) > 0)

            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <strong>{{ $error }}</strong><br>
                    @endforeach
            </div>

        @endif

		<form class="boder border-light p-5" action="{{ route('store_upcoming_event')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="card-title">
			<p class="text-sm-center h4 mb-4">Add Upcoming Event</p>
		</div>
		<div class="card-body">
			<label class="text-sm-left">Title:</label>
			<input type="text" id="upcoming_eventTitle" class="form-control" name="title" placeholder="Enter title">
			<br>
			<label class="text-sm-left" for="inputTextArea">Description:</label>
  			<textarea class="form-control" rows="5" name="description" id="inputTextArea" placeholder="Enter text here..."></textarea>
			<br>
			<div class="input-group">
  				<div class="input-group-prepend">
    				<span class="input-group-text" id="inputGroupFileAddon01">Upload Image &nbsp;<i class="fas fa-upload"></i></span>
  				</div>
  				<div class="custom-file">
    				<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
    			<label class="custom-file-label text-sm-center" for="inputGroupFile01"></label>
  				</div>
			</div>
			<button class="btn btn-info my-4 btn-block text-sm-center" type="submit"><i class="fas fa-plus-square"></i> &nbsp; Add Upcoming Event</button>
		</div>
		</form>
	</div>

</div>

<br>

<div class="container">
	<div class="jumbotron">

		<h1 class="text-sm-center"><b>Upcoming Events</b></h1>


				@foreach($upcoming_events as $upcoming_event)


				<!-- Card -->
				<div class="card">

				  <!-- Card image -->
				  <img class="card-img-top img-thumbnail mx-auto d-block" style=" width: 400px;" src="{{ asset('public/uploads/upcoming_event/' .$upcoming_event->image) }}" alt="{{ $upcoming_event->title }}">

				  <!-- Card content -->
				  <div class="card-body">

				    <!-- Title -->
				    <h4 class="card-title">{{ $upcoming_event->title }}</h4>
				    <!-- Text -->
				    <p class="card-text">@lang($upcoming_event->description)</p>
				    <!-- Button -->
				    <div class="text-sm-right">
				    <a href="{{ route('edit_upcoming_event', [$upcoming_event->id]) }}" class="btn btn-info"><i class="far fa-edit"></i></a>
					<form method="post" class="delete_form" action="{{action('AdminController@upcoming_delete', [$upcoming_event->id])}}">
						@csrf
						<input type="hidden" name="_method" value="DELETE" />
						<button type="submit" class="btn btn-danger"><a class="fas fa-trash"></a></button>

					</form>
					</div>

				  </div>

				</div>
				<!-- Card -->


				@endforeach


		{{ $upcoming_events->links() }}
		</div>
	</div>

</div>

<script>
	CKEDITOR.replace( 'description' );
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
	$(document).ready(function(){
		$('.delete_form').on('submit', function(){
			if(confirm("Are You sure want to delete this Event?"))
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
