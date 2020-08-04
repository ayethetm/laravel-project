@extends('backendtemplate')
@section('title','Subcategories')

@section('content')

<div class="container-fluid">
	<h2>Subcategory Edit Form</h2>
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
	<form method="post" action="{{route('subcategories.update',$subcategory->id)}}" enctype="multipart/form-data">
		@csrf
		@method('PUT')
		
		<div class="form-group row">
			<label for="inpoutName" class="col-sm-2 col-form-label">Name:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="inpoutName" name="name" value="{{$subcategory->name}}">
			</div>
		</div>
		
		<div class="form-group row">
				<label for="inputCategory" class="col-sm-2 col-form-label">Category:</label>
				<div class="col-sm-10">
					<select name="category" class="form-control">
						<optgroup label="Choose Category">
							@foreach($categories as $category)
							<option value="{{$category->id}}" @if($category->id==$subcategory->category_id){{'selected'}}@endif>{{$category->id}}</option>
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