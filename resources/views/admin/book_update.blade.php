<!DOCTYPE html>
<html>
  <head> 
	<base href="/public">
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

		  <h1  style="font-size:25px;">Update Books</h1>
			<form action="{{url('edit_book',$book->id)}}" method="post" enctype="multipart/form-data" >
				@csrf
			<div class="col-12 col-sm-6 py-2 ">
				<label for="">Book Title </label>
            <input  type="text" class="form-control" style="color:black;" value="{{$book->title}}"  name="book_title" required="">
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Author Name</label>
            <input  type="text" class="form-control" style="color:black;" value="{{$book->author_name}}" name="author_name" required="">
          </div>
		  
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Price</label>
            <input  type="text" class="form-control" style="color:black;" value="{{$book->price}}" name="price" required="">
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Quantity</label>
            <input  type="text" class="form-control" style="color:black;" value="{{$book->quantity}}" name="quantity" required="">
          </div>
		  <div class="col-12 col-sm-6 py-2 ">
		    <label for="">Description</label>
            <textarea name="description"  id="">{{$book->description}}</textarea>
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
		    <label for="">Category</label>
			<select  name="category">
				<option value="{{$book->category_id}}">{{$book->category->cat_title}}</option>
				@foreach($category as $category)
				<option value="{{$category->id}}">{{$category->cat_title}}</option>

				@endforeach
			</select>
            
          </div>
		  
		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Current Author Image</label>
			<img style="width:80px" src="author/{{$book->author_img}}" alt="">
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Change Author Image</label>
			<input type="file" name="author_img" id="">
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Current Book Image</label>
			<img style="width:80px" src="book/{{$book->book_img}}" alt="">
          </div>

		  <div class="col-12 col-sm-6 py-2 ">
			<label for="">Change Book Image</label>
			<input type="file" name="image" id="">
          </div>


		  <div class="col-12 col-sm-6 py-2 ">
		  <button type="submit"  class="btn btn-success mt-3  wow zoomIn">Update Book  </button>
		  </div>
		  </form>

		  </div>
		</div>
	 </div>
       @include('admin.footer')
  </body>
</html>