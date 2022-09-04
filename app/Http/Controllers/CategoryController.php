<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //CRUD
    public function index(){
        return response()->json(Category::with('products')->get());
    }//Read
    public function store(CategoryRequest $request){
        $model = Category::query()->create($request->all());
        return response()->json($model);
    }//Create
    public function update(CategoryRequest $request){
        if(!$request->has('id')){
            return response()->json([
                "status" => false,
                "message" => "id obligatoire",
            ], 404);
        }
        $model = Category::query()->find($request->input('id'));
        return response()->json([
            "status" => $model->update($request->all())
        ]);
    }//Update
    public function delete(Request $request){
        $model = Category::query()->find($request->input('id'));
        return response()->json([
            'status' => $model != null ? $model->delete() : false
        ]);
    }//Delete

    public function getById($id){
        return response()->json(Category::with('products')->find($id));
    }
}
