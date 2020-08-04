@extends('frontendtemplate')
@section('title','Product Detail')
@section('content')
	<div class="container mt-5">
		
              <div class="row mt-5">
              <div class="col-md-6 pl-5">
              <img src="{{asset($item->photo)}}" class="card-img-top img-fluid d-block w-75">
              </div>
              <div class='col-md-6'>
              <div class='card-body text-left'>
                <h3 class='card-text font-weight-bold'>{{$item->name}}
                </h3>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star'></i>
                <i class='fa fa-star-half'></i><br><br>
                <h5 class='card-text font-weight-bold'>{{$item->price}}  MMK</h5>
                <br><p>Available Sizes</p>
                <button class='btn btn-outline-secondary btn-sm'>37</button>
                <button class='btn btn-outline-secondary btn-sm'>38</button>
                <button class='btn btn-outline-secondary btn-sm'>39</button>
                <button class='btn btn-outline-secondary btn-sm'>40</button>
                <button class='btn btn-outline-secondary btn-sm'>42</button>
                <br><br>
                <p>Quantity 
                <select>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                  <option>5</option>
                </select>
                </p>
                <a class="btn btn-outline-success" 
                data-photo="{{asset($item->photo)}}" 
		      	data-name="{{$item->name}}" 
		      	data-price="{{$item->price}}" 
		      	data-description="{{$item->description}}" 
		      	href="{{route('cart')}}">
                Add to Cart</a></div>
              </div>
              </div>
            </div>

@endsection

@section('script')
<script type="text/javascript" 
src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection