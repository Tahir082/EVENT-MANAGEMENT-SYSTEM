@extends('layouts.adminapp')
@section('content')


		 @if ($message = Session::get('success'))

                <div class="alert alert-success alert-block">

                    <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

                </div>
            @endif


@foreach($events as $event)

<div class="container-fluid">
	<div class="jumbotron">

			<div class="row">
				<div class="col-sm-2">
					<table class="table table-sm text-sm-center">
						<tr>
							<td class="td-sm"><a href="{{ route('edit_event',[$event->id]) }}" class="btn btn-info"><i class="far fa-edit"></i><br>Edit</a></td>
							<td class="td-sm"><a href="#" class="btn btn-danger"><i class="far fa-trash-alt"></i><br>Delete</a></td>
						</tr>
				</table>
				</div>

			</div>

			<div class="row">

				<div class="col-sm-4">
					<div class="jumbotron pt-4 pb-4">
					@foreach($img[$event->id] as $im)
					<img src="{{ asset('public/uploads/latest_event/' .$im->image) }}" class="img-thumbnail h-40 pb-3" alt="Image">
					@endforeach
					</div>
				</div>

				<div class="col-sm-8">
					<div class="jumbotron pt-4">
						<h3><b>{{ $event->title }}</b></h3>
						@lang($event->description)
					</div>
				</div>


			</div>
			{{ $events->links() }}
	</div>


</div>


@endforeach

@endsection
