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

		<form class="boder border-light p-5" action="{{ route('store_executive')}}" method="POST" enctype="multipart/form-data">
	{{csrf_field()}}
		<div class="card-title">
			<p class="text-sm-center h4 mb-4">Add Executive</p>
		</div>
		<div class="card-body">
			<label class="text-sm-left">Name:</label>
			<input type="text" id="executiveName" class="form-control" name="name" placeholder="Enter name">
			<br>
			<label class="text-sm-left">Title:</label>
			<input type="text" id="executiveTitle" class="form-control" name="title" placeholder="Enter title">
			<br>
			<label class="text-sm-left">Student Id:</label>
			<input type="text" id="executiveId" class="form-control" name="std_id" placeholder="Enter ID" maxlength="13" size="13">
			<br>
			<label class="text-sm-left">Contact:</label>
			<input type="tel" id="executivecontact" class="form-control" name="contact" placeholder="Enter contact" maxlength="11" size="11" required>
			<br>
			<label class="text-sm-left">Email:</label>
			<input type="email" id="executiveEmail" class="form-control" name="email" placeholder="Enter email" required>
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
			<button class="btn btn-info my-4 btn-block text-sm-center" type="submit"><i class="fas fa-plus-square"></i> &nbsp; Add Executive</button>
		</div>
		</form>
	</div>

</div>

<br>

<div class="container">

		<h1>Executives</h1>
		<div class="table-responsive-sm">
		<table class="table table-stripped table-bordered table-sm table-hover text-sm-center">
			<thead class="thead-dark">
				<tr>
					<th class="th-sm" scope="col">Image</th>
					<th class="th-sm" scope="col">Name</th>
					<th class="th-sm" scope="col">Title</th>
					<th class="th-sm" scope="col">ID</th>
					<th class="th-sm" scope="col">Contact</th>
					<th class="th-sm" scope="col">Email</th>
					<th class="th-sm" scope="col">Edit</th>
					<th class="th-sm" scope="col">Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($executive as $exe)
				<tr>
					<td class="td-sm"><img class="center-block" style="height: 100px; width: 100px;" src="{{ asset('public/uploads/executive/' .$exe->image) }}" alt="{{ $exe->title }}"></td>
					<td class="td-sm">{{ $exe->name }}</td>
					<td class="td-sm">{{ $exe->title }}</td>
					<td class="td-sm">{{ $exe->std_id }}</td>
					<td class="td-sm">{{ $exe->contact }}</td>
					<td class="td-sm">{{ $exe->email }}</td>
					<td class="td-sm"><a href="{{ route('edit_executive',[$exe->id]) }}" class="btn btn-info"><i class="far fa-edit"></i></a></td>
					<td class="td-sm"><a href="{{ route('delete_executive',[$exe->id]) }}" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
				</tr>


				@endforeach
			</tbody>
		</table>
		{{ $executive->links() }}
		</div>

</div>



@endsection
