<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryController extends Controller
{
    public function getCate(){
    	$data=Category::all();
    	return view('backend.category')->with('data',$data);
    }
    public function postCate(AddCateRequest $request){
    	$category = new Category;
    	$category->name=$request->name;
    	$category->cate_slug=str_slug($request->name);
    	$category->save();
    	return back();
    }
    public function getEditCate($id){
    	$data=Category::find($id);
    	return view('backend.editcategory')->with('data',$data);
    }
    public function postEditCate(EditCateRequest $request){
    	$category = Category::find($request->id);
    	$category->name=$request->name;
    	$category->cate_slug=str_slug($request->name);
    	$category->save();
    	return redirect()->route('Category');
    }
    public function getDeleteCate($id){
    	Category::destroy($id);
    	return back();
    }
}
