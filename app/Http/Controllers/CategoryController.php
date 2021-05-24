<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\lookups\CategoryCollection;

class CategoryController extends Controller
{
    public function index(){
    	return new CategoryCollection(Category::all());
    }
    public function store(Request $request){
    	$validator = Validator::make($request->all(),[
    		'name'=>'required|string|max:255'
    	]);

    	if ($validator->fails()) {
    		return response([
    			'errors'=>$validator->errors()
    		] , 422);
    	}
    	return Category::create($request->all());
    }
    public function update(Request $request , $id){
            $validator = Validator::make($request->all(),[
    		'name'=>'required|string|max:255'
    	]);
            if ($validator->fails()) {
    		return response([
    			'errors'=>$validator->errors()
    		] , 422);
    	}
    	$category->update($request->all());
    	return $category;

    }
}
