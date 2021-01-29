@extends('layouts.main')
@section('content')

<div class="container">
	<div class="card">
		@if (count($errors) > 0)

            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <strong>{{ $error }}</strong><br>
                    @endforeach
            </div>

        @endif
		<form class="text-center boder border-light p-5" action="{{ route('update_slider',[$sliders->id]) }}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="card-title">
			<p class="h4 mb-4">Update Slider</p>
		</div>
		<div class="card-body">
			<p class="h6 text-left">Title:</p>
			<input type="text" id="SliderTitle" class="form-control" name="title" value="{{ $sliders->title }}">

			<img class="center-block img-thumbnail mt-3" style="height: 200px; width: 300px;" src="{{ asset('public/uploads/slider/' .$sliders->image) }}" alt="{{ $sliders->title }}">

			<div class="input-group mt-3">
  				<div class="input-group-prepend">
    				<span class="input-group-text" id="inputGroupFileAddon01">Change Image &nbsp;<i class="fas fa-exchange-alt"></i></span>
  				</div>
  				<div class="custom-file">
    				<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image">
    			<label class="custom-file-label" for="inputGroupFile01"></label>
  				</div>
			</div>
			<button class="btn btn-info my-4 btn-block" type="submit"><i class="far fa-save"></i>&nbsp; Update Slider</button>
		</div>
		</form>
	</div>

</div>

@endsection