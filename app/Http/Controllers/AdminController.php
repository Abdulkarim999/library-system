<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Borrow;



class AdminController extends Controller
{
    public function index(){

		if(Auth::user()->usertype == 'user'){
			$data = Book::all();						
           return view('home.index',compact('data'));
         }
       else{
		$user = User::all()->count();
		$book = Book::all()->count();
		$borrow = Borrow::where('status','Approved')->count();
		$returned = Borrow::where('status','Returned')->count();



           return view('admin.index',compact('user','book','borrow','returned'));
         }

	}

	public function category_page(){
		$data =Category::all();
		return view('admin.category',compact('data'));
	}

	public function add_category(Request $request){
		$data = new Category;
		$data->cat_title = $request->category;
		$data->save();
		return redirect()->back()->with('message','Category Added Successfully');

	}

	public function cat_delete($id){
		$data = Category::find($id);
		$data->delete();
		return redirect()->back();



	}

	public function edit_category($id){
		$data = Category::find($id);

		return view('admin.edit_category',compact('data'));

	}
	public function update_category(Request $request,$id){
		
		$data = Category::find($id);
		$data->cat_title = $request->cat_name;
		$data->save();
		return redirect('/category_page')->with('message','Category Updated Successfully');

	}

	public function add_book(){
		$data = Category::all();

		return view('admin.add_book',compact('data'));
	}

	public function store_book(Request $request){

		$data = new Book;
		$data->title = $request->book_title;
		$data->author_name = $request->author_name;
		$data->price = $request->price;
		$data->quantity = $request->quantity;
		$data->description = $request->description;
		$data->category_id = $request->category;
		$image=$request->file('image');
		
		if($image){ 
			$imagename=time() . '.' . $image->getClientOriginalExtension();
			$request->image->move('book',$imagename);
			$data->book_img=$imagename;
		}

		$image=$request->author_img;
		if($image){ 
			$imagename=time() . '.' . $image->getClientOriginalExtension();
			$request->author_img->move('author',$imagename); 
			$data->author_img=$imagename;
		}


		$data->save();
		return redirect()->back()->with('message','Data Sent Successfully!'); 

		
	}

	public function show_book(){
		$book = Book::all();
		return view('admin.show_book',compact('book'));
	}

	public function book_delete($id){
		$book = Book::find($id);
		$book->delete();
		
		return redirect()->back()->with('message','Data Deleted Successfully');
	}

	public function book_update($id){
		$book = Book::find($id);
		$category = Category::all();
		return view('admin.book_update',compact('book','category'));
	}

	public function edit_book(Request $request,$id){
		$book = Book::find($id);
		$book->title = $request->book_title;
		$book->author_name = $request->author_name;
		$book->price = $request->price;
		$book->quantity = $request->quantity;
		$book->description = $request->description;
		$book->category_id = $request->category;
		$image=$request->file('image');
		
		if($image){ 
			$imagename=time() . '.' . $image->getClientOriginalExtension();
			$request->image->move('book',$imagename);
			$book->book_img=$imagename;
		}

		$image=$request->author_img;
		if($image){ 
			$imagename=time() . '.' . $image->getClientOriginalExtension();
			$request->author_img->move('author',$imagename); 
			$book->author_img=$imagename;
		}
		$book->save();
		return redirect('/show_book');


	}

	public function borrow_request(){
		$data = Borrow::all();
		return view('admin.borrow_request',compact('data'));
	}

	public function approve_book($id){
		$data = Borrow::find($id);

		$status = $data->status;

		if($status =='Approved'){
			return redirect()->back(); 
		}

		else{
			$data->status = 'Approved';
			$data->save();
		}
		$data->status = 'Approved';
		$data->save();

		$bookid = $data->book_id;
		$book = Book::find($bookid);
		$book_qty = $book->quantity - '1';
		$book->quantity = $book_qty;
		$book->save();
		return redirect()->back();
	}

	public function return_book($id){
		$data = Borrow::find($id);

		$status = $data->status;

		if($status =='Returned'){
			return redirect()->back(); 
		}

		else{
			$data->status = 'Returned';
			$data->save();
		}
		$data->status = 'Returned';
		$data->save();

		$bookid = $data->book_id;
		$book = Book::find($bookid);
		$book_qty = $book->quantity + '1';
		$book->quantity = $book_qty;
		$book->save();
		return redirect()->back();
	}

	public function reject_book($id){
		$data = Borrow::find($id);
		$data->status = 'Rejected';
		$data->save();
		return redirect()->back();
	}
	public function home_home(){

		if(Auth::user()->usertype == 'user'){
			$data = Book::all();						
           return view('home.index',compact('data'));
         }
       else{
		$user = User::all()->count();
		$book = Book::all()->count();
		$borrow = Borrow::where('status','Approved')->count();
		$returned = Borrow::where('status','Returned')->count();



           return view('admin.index',compact('user','book','borrow','returned'));
         }

	}

	
}
