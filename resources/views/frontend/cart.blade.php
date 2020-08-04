@extends('frontendtemplate')
@section('title','Cart Detail')
@section('content')
	<div class="container mt-5">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Photo</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td> <img src="" class="img-fluid"></td>
					<td>Item One</td>
					<td>Item One</td>
					<td>Item One</td>
				</tr>
			</tbody>
		</table>
	</div>
@endsection

@section('script')
<script type="text/javascript" 
src="{{asset('frontendtemplate/js/custom.js')}}"></script>
@endsection