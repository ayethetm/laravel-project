@extends('backendtemplate')
@section('title','Subcategories')

@section('content')

<div class="container-fluid">
	<h2 class="d-inline-block">Subcategories List</h2>
	<a href="{{route('subcategories.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      
      <th scope="col">Name</th>
      
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($subcategories as $subcategory)
    <tr>
      <td>{{$subcategory->id}}</td><!-- table's column name -->
      <td>{{$subcategory->name}}</td>
      
      <td>
      	<a href="{{route('subcategories.edit',$subcategory->id)}}" class="btn btn-warning ">Edit</a>
      	 <form method="post" action="{{route('subcategories.destroy',$subcategory->id)}}" class="d-inline-block" >
      		@csrf
      		@method('DELETE')
      	<!-- <input type="submit" name="btn-submit" value="Delete" class="btn btn-danger delete-confirm" > -->
        <a class="btn btn-danger btn-sm deletebtn" href="{{route('subcategories.destroy',$subcategory->id)}}" data-id="{{$subcategory-> id}}">delete</a> 
      	
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
  //   $('.deletebtn').click(function (event) {
  //     event.preventDefault();
  //       // alert('hello'); 
  //       //var delete_id = $(this).closest('tr').find('.ser_del').val();
  //       // alert(delete_id);
  //       swal({
  //         title: "Are you sure?",
  //         text: "Once deleted, you will not be able to recover this item!",
  //         icon: "warning",
  //         showCancelButton: 'true',
  //         buttons: true,
  //         dangerMode: true,
  //       }).then((result)=>{
  //         console.log('true');
  //       })
  // })
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
