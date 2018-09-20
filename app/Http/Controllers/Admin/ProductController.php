<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AddproductRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use DB;
class ProductController extends Controller
{
	public function getProduct(){
    	//$data=DB::table('products')->join('categories','products.cate_id','=','categories.id')->get();
		$data=Product::all();
    	//dd($data->category->name);
		return view('backend.product')->with('data',$data);
	}
	public function getAddProduct(){
		$data=Category::all();
		return view('backend.addproduct')->with('data',$data);
	}
	public function postAddproduct(AddproductRequest $request){
		$product = new Product;
		$filename=$request->img->getClientOriginalName();
		$product->name=$request->name;
		$product->prod_slug=str_slug($request->name);
		$product->img = $filename;
		$product->price=$request->price;
		$product->accessories=$request->accessories;
		$product->warranty=$request->warranty;
		$product->promotion=$request->promotion;
		$product->condition=$request->condition;
		$product->status=$request->status;
		$product->description=$request->description;
		$product->cate_id=$request->cate;
		$product->featured=$request->featured;
		$product->save();
		$request->img->storeAs('avata',$filename);

	}
	public function getEditProduct($id){
		$data['data']=Product::find($id);
		$data['cate']=Category::all();
		return view('backend.editproduct',$data);
	}
	public function postEditProduct(Request $request){
		$product=Product::find($request->id);
		$product->name=$request->name;
		$product->prod_slug=str_slug($request->prod_slug);
		$product->price=$request->price;
		$product->warranty=$request->warranty;
		$product->accessories=$request->accessories;
		$product->condition=$request->condition;
		$product->promotion=$request->promotion;
		$product->status=$request->status;
		$product->description=$request->description;
		$product->featured=$request->featured;
		$product->cate_id=$request->cate;
		if($request->hasFile('img')){
			$img=$request->img->getClientOriginalName();
			$product=$img;
			$request->img->storeAs('avata'.$img);
		}
		$product->save();
		return redirect()->route('Product');

	}


	public function getDeleteproduct($id){
		Product::destroy($id);
		return back();
	}

}
