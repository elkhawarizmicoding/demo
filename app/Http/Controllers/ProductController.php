<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //CRUD
    public function index(){
        return response()->json(Product::with('category')->get());
    }//Read
    public function store(ProductRequest $request){
        $model = Product::query()->create($request->all());
        return response()->json($model);
    }//Create
    public function update(ProductRequest $request){
        $model = Product::query()->find($request->input('id'));
        return response()->json([
            "status" => $model->update($request->all())
        ]);
    }//Update
    public function delete(Request $request){
        return response()->json([
            'status' => Product::query()->find($request->input('id'))->delete()
        ]);
    }//Delete

    public function getById($id){
        return response()->json(Product::with('category')->find($id));
    }
}
