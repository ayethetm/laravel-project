@extends('backendtemplate')

@section('title','Items')

@section('content')

<div class="container-fluid">
	
	<div class="container">
		    <div class="row justify-content-center">

		      <div class="col-xl-10 col-md-6">

		        <div class="card o-hidden border-0 shadow-lg my-3">
		          <div class="card-body p-0">
		            <!-- Nested Row within Card Body -->
		            <div class="row">
		              <!-- <div class="col-lg-6">
		              	<img src="admin/img/register.jpg" 
		              	class="d-block w-100  img-fluid">
		              </div> -->
		              <div class="col-lg-12">
		                <div class="p-5">
		                  <div class="text-center">
		                    <h1 class="h4 text-gray-900 mb-4">Item Edit Form</h1>
		                  </div>
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
		         			<form action="{{route('items.update',$item->id)}}" 
		         			method="post" 
		         			name="" enctype="multipart/form-data">
		         			 @csrf
		         			 @method('PUT')
								<div class="form-group row">
									<div class="col-md-2">
									   <label class="form-control-label" for="inputCodeno">Code No:</label>
									</div>
									<div class="col-md-10">
									    <input type="text" class="form-control" 
									    name="inputCodeno" value="{{$item->codeno}}">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2">
									   <label class="form-control-label" for="inputName" > Name:</label>
									</div>
									<div class="col-md-10">
									    <input type="text" class="form-control" name="inputName"  value="{{$item->name}}">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2">
									   <label class="form-control-label" for="inputPhoto">Photo:</label>
									</div>
									<div class="col-md-10">
									   <input type="file" class="form-control-file" 
									   name="inputPhoto" >
									   <img src="{{asset($item->photo)}}" width="100">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2">
									   <label class="form-control-label" for="inputPrice"> Price:</label>
									</div>
									<div class="col-md-10">
									   <input type="number" class="form-control" name="inputPrice"  value="{{$item->price}}">
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2">
									   <label class="form-control-label" for="inputDiscount" >Discount(%):
									   </label>
									</div>
									<div class="col-md-10">
									    <input type="number" class="form-control" name="inputDiscount"  value="{{$item->discount}}">
									</div>
								</div>
						  		<div class="form-group row">
						  			<div class="col-md-2">
									   <label class="form-control-label" for="inputDescription"> Description:
									   </label>
									</div>
									<div class="col-md-10">
									   <textarea class="form-control" name="inputDescription" >{{$item->description}}
									   </textarea>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-2">
								    <label for="inputBrand" 
								    class="form-control-label">
								    Brand:</label>
									</div>
									<div class="col-md-10">
								    <select class="form-control" name="brand" >
								    	@foreach($brands as $brand)
									      <option value="{{$brand->id}}"
									      	@if($brand->id == $item->brand_id) {{'selected'}}>
									      	@endif
									      	{{$brand->name}}
									      </option>
									     @endforeach
								    </select>
								  </div>
								</div>
								<div class="form-group row">
									<div class="col-md-2">
								    <label for="inputSubcategory" class="form-control-label">
								    Subcategory:</label>
									</div>
									<div class="col-md-10">
								    <select class="form-control" name="subcategory" >
								    	@foreach($subcategories as $subcategory)
									      <option value="{{$subcategory->id}}" 
									      	@if($subcategory->id == $item->subcategory_id) {{'selected'}}>
									      	@endif
									      	{{$subcategory->name}}</option>
									      @endforeach
								    </select>
								  </div>
								</div>
								<br>
								<div class="form-group row">
									<div class="col-sm-12" >
									    <input type="submit" name="btnsubmit" class="form-control btn-info w-25" value="Save" style="border-radius:13px;margin-left:35%;">
									</div>
								</div>
								
							</form> 
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
		    </div>
    </div>
</div>

@endsection