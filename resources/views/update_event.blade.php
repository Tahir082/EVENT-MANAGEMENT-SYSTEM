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


		<form class="text-center boder border-light p-5" action="{{ route('update_event',[$events->id]) }}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="card-title">
			<p class="h4 mb-4">Update Event</p>
		</div>
		<div class="card-body">
			<p class="h6 text-left">Title:</p>
			<input type="text" id="SliderTitle" class="form-control" name="title" value="{{ $events->title }}">


			<label class="text-sm-left" for="inputTextArea">Description:</label>
  			<textarea class="form-control" rows="5" name="description" id="inputTextArea" >{{ $events->description }}</textarea>



			@foreach ($images as $img)
				<div class="card-body">
                	<img class="center-block img-thumbnail mt-3" style="height: 200px; width: 300px;" src="{{ asset('public/uploads/latest_event/' .$img->image) }}" alt="Image">
                	<a href="{{ route('delete_event_image',[$events->id,$img->id]) }}" class="btn btn-danger btn-inline text-sm-center"><i class="far fa-trash-alt"></i> Delete</a>
                </div>
            @endforeach

            	<div class="input-group control-group increment">
	  				<div class="input-group-prepend">
	    				<span class="input-group-text" id="inputGroupFileAddon01">Add Image &nbsp; <i class="far fa-plus-square"></i> </span>
	  				</div>
	  				<div class="custom-file">
	    				<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="images[]" multiple>
	    				<p class="custom-file-label text-sm-center" for="inputGroupFile01"></p>
	  				</div>
				</div>


			<button class="btn btn-info my-4 btn-block" type="submit"><i class="far fa-save"></i> &nbsp; Update Event</button>
		</div>
		</form>
	</div>

</div>


<script>
	CKEDITOR.replace( 'description' );
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
</script>

@endsection
