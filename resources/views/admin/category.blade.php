<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.2/sweetalert2.min.css">

   <style>
	.div_center{
		text-align:center;
		margin:auto;
	}
	.cat_label{
		font-size:30px;
		font-weight:bold;
		padding:30px;
		color:white;
	}
	.center{
		margin:auto;
		width:50%;
		text-align:center;
		margin-top:30px;
		border:1px solid white;
	}
	th{
		background-color:skyblue;
		padding:10px;
	}
	tr{
		border:1px solid white;
		padding:10px;
	}
   </style>
  </head>
  <body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
         <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

		  @if(session()->has('message'))
             <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert">x</button>
            {{session()->get('message')}}

             </div>
          @endif


		  <div class="div_center">
			<h1 class="cat_label">Add Category</h1>

			<form action="{{url('add_category')}}" method="Post">
				@csrf
				<span style="padding-right:15px;">
				<label for="">Category Name</label>
				<input type="text" name="category" id="" required>
                </span>
				<input class="btn btn-primary" type="submit" value="Add Category">
			</form>

			<div>
				<table class="center">
					<tr>
						<th>Category Name</th>
						<th>Action </th>
						<th>Action </th>
					</tr>
					@foreach($data as $data)

					<tr>
						<td>{{$data->cat_title}}</td>
						<td> 
							<a  class="btb btn-info" href="{{url('edit_category',$data->id)}}">Update</a> 
						</td>
						<td> 
							<a onclick="return confirm('Are you sure to delete this')" class="btb btn-danger" href="{{url('cat_delete',$data->id)}}">Delete</a> 
						</td>
					</tr>
					@endforeach
				</table>
			</div>




		  </div>

          </div>
        </div>
        </div>
       @include('admin.footer')


  </body>
</html>