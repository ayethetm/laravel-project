@extends('backendtemplate')
@section('title','Categories')

@section('content')

<div class="container-fluid">
	<h2>Category Create Form</h2>
	
	<form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
		@csrf
		
		<div class="form-group row">
			<label for="inpoutName" class="col-sm-2 col-form-label">Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inpoutName" name="name">
				@error('name')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutPhoto" class="col-sm-2 col-form-label">Photo:</label>
			<div class="col-sm-10">
				<input type="file" class="form-control-file" id="inpoutPhoto" name="photo">
				@error('photo')
					<span class="text-danger">{{ $message }}</span>
					@enderror
			</div>
		</div>
		

		

		<div class="form-group row">
			<input type="submit" name="btnsubmit" value="Save" class="btn btn-primary">
		</div>

		</form>
	</div>



@endsection