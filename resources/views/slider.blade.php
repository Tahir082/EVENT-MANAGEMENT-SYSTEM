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

		@if (count($errors) > 0)

            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <strong>{{ $error }}</strong><br>
                    @endforeach
            </div>

        @endif

		<form class="boder border-light p-5" action="{{ route('store_slider')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="card-title">
			<p class="text-sm-center h4 mb-4">Add Slider Content</p>
		</div>
		<div class="card-body">
			<label class="text-sm-left">Title:</label>
			<input type="text" id="SliderTitle" class="form-control" name="title" placeholder="Enter title">
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
			<button class="btn btn-info my-4 btn-block text-sm-center" type="submit"><i class="fas fa-plus-square"></i> &nbsp; Add Slider</button>
		</div>
		</form>
	</div>

</div>

<br>

<div class="container">

		<h1>Slider Images</h1>
		<div class="table-responsive-sm">
		<table class="table table-stripped table-bordered table-sm table-hover text-sm-center">
			<thead class="thead-dark">
				<tr>
					<th class="th-sm" scope="col">Title</th>
					<th class="th-sm" scope="col">Image</th>
					<th class="th-sm" scope="col">Edit</th>
					<th class="th-sm" scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($Sliders as $slider)
				<tr>
					<td class="td-sm">{{ $slider->title }}</td>
					<td class="td-sm"><img class="center-block" style="height: 100px; width: 100px;" src="{{ asset('public/uploads/slider/' .$slider->image) }}" alt="{{ $slider->title }}"></td>
					<td class="td-sm"><a href="{{ route('edit_slider',[$slider->id]) }}" class="btn btn-info"><i class="far fa-edit"></i></a></td>
					<td class="td-sm"><a href="{{ route('delete_slider',[$slider->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
				</tr>


				@endforeach
			</tbody>
		</table>
		{{ $Sliders->links() }}
		</div>

</div>



@endsection
