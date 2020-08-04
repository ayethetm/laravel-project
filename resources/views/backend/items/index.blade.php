@extends('backendtemplate')

@section('title','Items')

@section('content')

<div class="container-fluid">

	<div class="h4 text-gray-900 mb-4 text-center">Items Lists</div>
	<a href="{{route('items.create')}}" class="btn btn-success mb-3 d-inline-block ml-auto">Add New</a>
	<div class="row">
		<table class="table  col-md-12">
		  	<thead>
			    <tr>
			      <th>No.</th>
			      <th>Code No</th>
			      <th>Name</th>
			      <th>Price</th>
			      <th colspan="2">Actions</th>
			    </tr>
		  	</thead>
		  	<tbody>
		  	@foreach($items as $item)
		    <tr>
		      <td>{{$item->id}}</td>
		      <td>{{$item->codeno}} 
		      	<a href="{{route('items.show',$item->id)}}">
		      		<span class="badge badge-success ml-2">
		      			<i class="fa fa-eye"></i>
		      		</span>
		      	</a>
		      	<!-- Modal -->
		      	<a href="#"  class="detailBtn" 
		      	data-photo="{{asset($item->photo)}}" 
		      	data-name="{{$item->name}}" 
		      	data-codeno="{{$item->codeno}}" 
		      	data-price="{{$item->price}}" 
		      	data-description="{{$item->description}}">
		      		<span class="badge badge-primary ml-2">
		      			<i class="fa fa-eye"></i>
		      		</span>
		      	</a>
		      </td>
		      <td>{{$item->name}}</td>
		      <td>{{$item->price}}</td>
		      <td>
		      	<a href="{{route('items.edit',$item->id)}}" class="btn btn-warning"><span class="fa fa-pen"></span></a>
		      	<form method="post" action="{{route('items.destroy',$item->id)}}" class="d-inline-block" 
		      	onsubmit="return confirm('Are you sure?')">
		      		@csrf
		      		@method('DELETE')
		      		<input type="submit" name="btn-submit" class="btn btn-danger" value="Delete">
		      	</form>
		      </td>
		    </tr>
		    @endforeach
		  	</tbody>
		</table>
	</div>
</div>

<!-- Detail Modal -->
<div class="modal" id="detailModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title name" >
					
				</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-6">
						<img src="" class="img-fluid itemImg w-75 d-block mx-auto" >
					</div>
					<div class="col-md-6 content" >
						
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>
</div>

@endsection

@section('script')
<script type="text/javascript">
	$(document).ready(function()
	{
		$('.detailBtn').click(function()
		{
			let photo = $(this).data('photo');
			let name = $(this).data('name');
			let codeno = $(this).data('codeno');
			let price = $(this).data('price');
			let description = $(this).data('description');

			$('.itemImg').attr('src',photo);
			$('.name').text(name);
			$('.content').html(`<p>${codeno}</p>
								<p>${price} MMK</p>
								<p>${description}</p>`)
			$('#detailModal').modal('show');
		})
	})
</script>
@endsection