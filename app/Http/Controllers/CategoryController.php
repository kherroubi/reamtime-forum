<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(10);
        return $categories;
    }

    public function store(Request $request){
        $request['slug'] = str_slug($request->name);
        $category = Category::create($request->all());
        return $category;
    }

    public function show(Category $category){
        return $category;
    }

    public function update(Request $request, Category $category){
        $category->update($request->all());
        return $category;
    }

    public function destroy(Category $category){
        $category->delete();
        return response('Category deleted', 202);
    }
}
