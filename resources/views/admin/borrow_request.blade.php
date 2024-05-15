<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')
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

		  <div class="container">
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">

				<table class="table table-sm table-striped table-bordered table-hover table-responsive" >
  <thead>
    <tr>
      <th scope="col">User Name </th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Book title</th>
	  <th scope="col">Quantity </th>
	  <th scope="col">Borrow Status </th>
	  <th scope="col">Book Image </th>
	  <th scope="col">Change Status </th>

	 
    </tr>
  </thead>
  <tbody>
	@foreach($data as $data)
    <tr>
      <td>{{$data->user->name}}</td>
	  <td>{{$data->user->email}}</td>
	  <td>{{$data->user->phone}}</td>
	  <td>{{$data->book->title}}</td>
	  <td>{{$data->book->quantity}}</td>
	  <td>
		@if($data->status == 'Approved')
		<span style="color:skyblue;">{{$data->status}}</span>
		@endif

		@if($data->status == 'Returned')
		<span style="color:yellow;">{{$data->status}}</span>
		@endif

		@if($data->status == 'Rejected')
		<span style="color:red;">{{$data->status}}</span>
		@endif

		@if($data->status == 'Applied')
		<span style="color:white;">{{$data->status}}</span>
		@endif
	  </td>

	  <td>
		<img src="book/{{$data->book->book_img}}" alt="">
	  </td>
      
	  <td>
		<a class="btn btn-sm btn-warning"  href="{{url('approve_book',$data->id)}}">Approved</a>
		<a class="btn btn-sm btn-danger"  href="{{url('reject_book',$data->id)}}">Rejected</a>
		<a class="btn btn-sm btn-info"  href="{{url('return_book',$data->id)}}"> Returned</a>

	</td>

	
    </tr>
	@endforeach
  </tbody>
  
</table>



				</div>
			</div>
		  </div>
		  </div>

		  

		  </div>
		   </div>
		   </div>
    
       @include('admin.footer')
  </body>
</html>