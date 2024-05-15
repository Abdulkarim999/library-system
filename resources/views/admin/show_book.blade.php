<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
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
		border:1px solid yellowgreen;
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

		  <div>
				<table class="center">
					<tr>
						<th>Book Title </th>
						<th>Author Name </th>
						<th>Price </th>
						<th>Quantity </th>
						<th>Description </th>
						<th>Category </th>
						<th>Author Image </th>
						<th>Book Image </th>
						<th>Action</th>
						<th>Update</th>
					</tr>
					@foreach($book as $book)

					<tr>
						<td>{{$book->title}}</td>
						<td>{{$book->author_name}}</td>
						<td>{{$book->price}}</td>
						<td>{{$book->quantity}}</td>
						<td>{{$book->description}}</td> 
						<td>{{$book->category->cat_title}}</td>
						<td>
							<img src="author/{{$book->author_img}}" alt="">
						</td>
						<td>
							<img src="book/{{$book->book_img}}" alt="">
						</td>
						<td> 
							<a onclick="return confirm('Are you sure to delete this')" class="btb btn-danger" href="{{url('book_delete',$book->id)}}">Delete</a> 
						</td>
						<td> 
							<a  class="btb btn-info" href="{{url('book_update',$book->id)}}">Update</a> 
						</td>
						
						
					</tr>
					@endforeach
				</table>
			</div>


		  </div>
		</div>
	 </div>
       @include('admin.footer')
  </body>
</html>