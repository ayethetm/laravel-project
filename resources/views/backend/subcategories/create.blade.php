@extends('backendtemplate')
@section('title','Subcategories')

@section('content')

<div class="container-fluid">
	<h2>Subcategory Create Form</h2>
	

	<form method="post" action="{{route('subcategories.store')}}" enctype="multipart/form-data">
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
				<label for="inputcategory" class="col-sm-2 col-form-label">Category:</label>
				<div class="col-sm-10">
					<select name="category" class="form-control">
						<optgroup label="Choose Category">
							@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->id}}</option>
							@endforeach
						</optgroup>


					</select>
				</div>
		</div>

		<div class="form-group row">
			<input type="submit" name="btnsubmit" value="Save" class="btn btn-primary">
		</div>

		</form>
	</div>



@endsection