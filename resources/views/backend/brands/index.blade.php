@extends('backendtemplate')
@section('title','Brands')

@section('content')

<div class="container-fluid">
	<h2 class="d-inline-block">Brands List</h2>
	<a href="{{route('brands.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      
      <th scope="col">Name</th>
      
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($brands as $brand)
    <tr>
      <td>{{$brand->id}}</td><!-- table's column name -->
      <td>{{$brand->name}}</td>
      
      <td>
      	<a href="{{route('brands.edit',$brand->id)}}" class="btn btn-warning ">Edit</a>
      	<form method="post" action="{{route('brands.destroy',$brand->id)}}" class="d-inline-block" >
      		@csrf
      		@method('DELETE')
      	<a class="btn btn-danger btn-sm deletebtn" href="{{route('brands.destroy',$brand->id)}}" data-id="{{$brand-> id}}">delete</a> 
      	
      	</form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script type="text/javascript">
  $(document).ready(function () {
  
   $("tbody").on("click",".deletebtn",function(e){

    if(!confirm("Do you really want to do this?")) {
       return false;
     }

    e.preventDefault();
    var id = $(this).data("id");
    // var id = $(this).attr('data-id');
    var token = $("meta[name='csrf-token']").attr("content");
    var url = e.target;

    $.ajax(
        {
          url: url.href, //or you can use url: "company/"+id,
          type: 'DELETE',
          data: {
            _token: token,
                id: id
        },
        success: function (response){

            // $("#success").html(response.message)

            Swal.fire(
              'Remind!',
              'Company deleted successfully!',
              'success'
            )
             // location.reload(10000);
        }
     });
      return false;
   });
});
</script>

@endsection


