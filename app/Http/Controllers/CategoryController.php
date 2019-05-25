<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return CategoryResource::collection($categories);
    }

    public function store(Request $request){
        $request['slug'] = str_slug($request->name);
        $category = Category::create($request->all());
        return new CategoryResource($category);
    }

    public function show(Category $category){
        return new CategoryResource($category);
    }

    public function update(Request $request, Category $category){
        $category->update($request->all());
        return new CategoryResource($category);
    }

    public function destroy(Category $category){
        $category->delete();
        return response('Category deleted', 202);
    }
}
