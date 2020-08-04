@extends('backendtemplate')
@section('title','Categories')

@section('content')

<div class="container-fluid">
	<h2 class="d-inline-block">Categories List</h2>
	<a href="{{route('categories.create')}}" class="btn btn-success float-right btn-sm">Add New</a>
	<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      
      <th scope="col">Name</th>
      
      <th scope="col" colspan="2">Action</th>
    </tr>
  </thead>
  <tbody>
  	@foreach($categories as $category)
    <tr>
      <input type="hidden" name="" value="{{$category->id}}" class="ser_del"> 
      <td>{{$category->id}}</td><!-- table's column name -->
      <td>{{$category->name}}</td>
      
      <td>
      	<a href="{{route('categories.edit',$category->id)}}" class="btn btn-warning ">Edit</a>
      	<!-- <form method="post" action="{{route('categories.destroy',$category->id)}}" class="d-inline-block" >
      		@csrf
      		@method('DELETE')
      	<button class="btn btn-danger btn-flat btn-sm category-delete-confirm" data-id="{{ $category->id }}" data-action="{{ route('categories.destroy',$category->id) }}"> Delete</button>
      	
      	</form>
 -->     
  <a class="btn btn-danger btn-sm deletebtn" href="{{route('categories.destroy',$category->id)}}" data-id="{{$category-> id}}">delete</a> </td>
    </tr>
    @endforeach
  </tbody>
  <!-- <p id="success"></p> -->
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
