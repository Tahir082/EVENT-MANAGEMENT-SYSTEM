@extends('layouts.main')
@section('content')

<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>

<div class="container">
	<div class="card">
		@if (count($errors) > 0)

            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <strong>{{ $error }}</strong><br>
                    @endforeach
            </div>

        @endif
		<form class="text-center boder border-light p-5" action="{{ route('update_upcoming_event',[$upcoming_events->id]) }}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="card-title">
			<p class="h4 mb-4">Update Upcoming Event</p>
		</div>
		<div class="card-body">
			<p class="h6 text-left">Title:</p>
			<input type="text" id="upcoming_eventTitle" class="form-control" name="title" value="{{ $upcoming_events->title }}">

			<label class="text-sm-left" for="inputTextArea">Description:</label>
  			<textarea class="form-control" rows="5" name="description" id="inputTextArea">{{ $upcoming_events->description }}</textarea>

			<img class="center-block img-thumbnail mt-3" style="height: 200px; width: 300px;" src="{{ asset('public/uploads/upcoming_event/' .$upcoming_events->image) }}" alt="{{ $upcoming_events->title }}">

			<div class="input-group mt-3">
  				<div class="input-group-prepend">
    				<span class="input-group-text" id="inputGroupFileAddon01">Change Image &nbsp;<i class="fas fa-exchange-alt"></i></span>
  				</div>
  				<div class="custom-file">
    				<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
    			<label class="custom-file-label" for="inputGroupFile01"></label>
  				</div>
			</div>


			<button class="btn btn-info my-4 btn-block" type="submit"><i class="far fa-save"></i>&nbsp; Update Upcoming Event</button>
		</div>
		</form>
	</div>

</div>

<script>
	CKEDITOR.replace( 'description' );
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
</script>

@endsection