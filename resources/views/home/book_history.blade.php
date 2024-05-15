<!DOCTYPE html>
<html lang="en">

  <head>
@include('home.css')
<style>
	th
	{
		color: white;
		font-size: 18px;
		font-weight: bold;
	}
	
</style>
  </head>

<body>

@include('home.header')

<div class="currently-market">
    <div class="container">
      <div class="row">

	  @if(session()->has('message'))

	  <div style="margin-top: 100px;" class="alert alert-success">
		{{session()->get('message')}}
		<button type="button" class="close" aria-hidden="true" data-bs-dismiss="alert">x</button>

	  </div>
	  @endif

	  <div style="padding-top: 100px;" class="container">
			<div class="row">
				<div class="col-12">
					<div class="table-responsive">

				<table class="table table-sm table-striped table-bordered  table-responsive" >
  <thead>
    <tr style="background-color: skyblue;">
      <th scope="col">Book Name</th>
      <th scope="col">Book Author</th>
      <th scope="col">Book Status</th>
      <th scope="col">Image </th>
	  <th scope="col">Cancer Request </th>

    </tr>
  </thead>
  <tbody>
	@foreach($data as $data)
    <tr style="background-color: azure;">
      <td>{{$data->book->title}}</td>
	  <td>{{$data->book->author_name}}</td>
	  <td>{{$data->status}}</td>
	  <td>
		<img src="book/{{$data->book->book_img}}" alt="">
	  </td>
	  <td>
		@if($data->status == 'Applied')
		<a href="{{url('cancel_req',$data->id)}}" class="btn btn-warning">Cancer</a>
          @else
			<p style="font-weight:bold; color:black;">Not Allowed</p>
		  
		@endif
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



@include('home.footer')  
  </body>
</html>