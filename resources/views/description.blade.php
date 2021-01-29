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

		<form method="POST" action="{{ route('store_description',[$description->id]) }}" class="boder border-light p-5" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="card-title">
				<p class="text-sm-center h4 mb-4">About Description</p>
			</div>
			<div class="card-body">
				<label class="text-sm-left" for="Title">Title:</label>
				<input type="text" id="Title" class="form-control" name="title" value="{{ $description->title }}">
				<br>

				<label class="text-sm-left" for="inputTextArea">Description:</label>
  				<textarea class="form-control" rows="5" name="description" id="inputTextArea">{{ $description->description }}</textarea>

  				<br>

  				<img class="center-block img-thumbnail mt-3" style="height: 200px; width: 300px;" src="{{ asset('public/uploads/description/' .$description->image) }}" alt="{{ $description->title }}">

				<div class="input-group control-group increment">
	  				<div class="input-group-prepend">
	    				<span class="input-group-text" id="inputGroupFileAddon01">Upload Image &nbsp;<i class="fas fa-upload"></i></span>
	  				</div>
	  				<div class="custom-file">
	    				<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image" multiple>
	    				<label class="custom-file-label text-sm-center" for="inputGroupFile01"></label>
	  				</div>
				</div>
				<br>
				<button class="btn btn-info my-4 btn-block text-sm-center" type="submit"><i class="fas fa-plus"></i> Update Description</button>
			</div>
		</form>
	</div>
</div>

<br>






<script>
	CKEDITOR.replace( 'description' );
	CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
</script>


@endsection
