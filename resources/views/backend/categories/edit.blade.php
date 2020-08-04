@extends('backendtemplate')
@section('title','Categories')

@section('content')

<div class="container-fluid">
	<h2>Item Edit Form</h2>
	{{-- Must show related input errors --}}
	@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
	<form method="post" action="{{route('categories.update',$category->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		
		<div class="form-group row">
			<label for="inpoutName" class="col-sm-2 col-form-label">Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inpoutName" name="name" value="{{$category->name}}">
			</div>
		</div>
		<div class="form-group row">
			<label for="inpoutPhoto" class="col-sm-2 col-form-label">Photo:</label>
			<div class="col-sm-10">
				<input type="file" class="form-control-file" id="inpoutPhoto" name="photo" >
				<img src="{{asset($category->photo)}}" width="100">
				<input type="hidden" name="old_photo_path" value="{{$category->photo}}">
			</div>
		</div>

		<div class="form-group row">
			<input type="submit" name="btnsubmit" value="Save" class="btn btn-primary">
		</div>

		</form>
	
</div>

@endsection