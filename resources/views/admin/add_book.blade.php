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

		  <div class="container"  style="padding-top:50px;  ">
		  <div class="row">
			<div class="col-12">
				@if(session()->has('message'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert">x</button>
			{{session()->get('message')}}

		</div>
		@endif


			<h1  style="font-size:25px;">Add Books</h1>
			<form action="{{url('store_book')}}" method="post" enctype="multipart/form-data" >
				@csrf
			<div class="col-12 col-sm-6 py-2 ">
				<label for="">Book Title </label>
            <input  type="text" class="form-control" style="color:black;"  name="book_title" required="">
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Author Name</label>
            <input  type="text" class="form-control" style="color:black;"  name="author_name" required="">
          </div>
		  
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Price</label>
            <input  type="text" class="form-control" style="color:black;"  name="price" required="">
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Quantity</label>
            <input  type="text" class="form-control" style="color:black;"  name="quantity" required="">
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
		    <label for="">Description</label>
            <textarea name="description" id="" ></textarea>
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
		    <label for="">Category</label>
			<select name="category" id="" required>
				<option value="">Select a Category</option>
				@foreach($data as $data)
				<option value="{{$data->id}}">{{$data->cat_title}}</option>

				@endforeach
			</select>
            
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Book Image</label>
            <input type="file" name="image" id="">
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Author Image</label>
			<input type="file" name="author_img" id="">
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
		  <button type="submit"  class="btn btn-success mt-3  wow zoomIn">Add Book </button>
		  </div>
		  </form>

			</div>
		  </div>
		</div>





		   </div>
        </div>
          </div>
       @include('admin.footer')
  </body>
</html>