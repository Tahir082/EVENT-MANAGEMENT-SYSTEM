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

		<form method="POST" action="{{ route('store_latest_event')}}" class="boder border-light p-5" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="card-title">
				<p class="text-sm-center h4 mb-4">Add New Event Content</p>
			</div>
			<div class="card-body">
				<label class="text-sm-left" for="L_E_Title">Title:</label>
				<input type="text" id="L_E_Title" class="form-control" name="title" placeholder="Enter title">
				<br>

				<label class="text-sm-left" for="inputTextArea">Description:</label>
  				<textarea class="form-control" rows="5" name="description" id="inputTextArea" placeholder="Enter text here..."></textarea>

  				<br>

				<div class="input-group control-group increment">
	  				<div class="input-group-prepend">
	    				<span class="input-group-text" id="inputGroupFileAddon01">Upload Image &nbsp;<i class="fas fa-upload"></i></span>
	  				</div>
	  				<div class="custom-file">
	    				<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="images[]" multiple>
	    				<label class="custom-file-label text-sm-center" for="inputGroupFile01"></label>
	  				</div>
				</div>
				<br>
				<button class="btn btn-info my-4 btn-block text-sm-center" type="submit"><i class="fas fa-plus"></i> Add New Event</button>
			</div>
		</form>
	</div>
</div>

<br>

<div class="container">
	<div class="jumbotron">
		<a href="{{ route('all_event')}}" class="btn btn-info my-4 btn-block text-sm-center"><i class="fas fa-link"></i> All Event</a>
	</div>
</div>




<script>
	CKEDITOR.replace( 'description' );
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
</script>


@endsection
