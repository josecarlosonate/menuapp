<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryPostRequest;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{


    public function index()
    {
        return Category::all();
    }

    public function show(Request $request, Category $category)
    {
        return $category;
    }

    public function store(CategoryPostRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        return $category;
    }

    public function update(CategoryPostRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->fill($data);
        $category->save();

        return $category;
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        return $category;
    }

}
