<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryPostRequest;
use App\Category;


class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Request $request, Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryPostRequest $request)
    {
        $data = $request->validated();
        $category = Category::create($data);
        return redirect()->route('categories.index')->with('status', 'Category created!');
    }

    public function edit(Request $request, Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryPostRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->fill($data);
        $category->save();
        return redirect()->route('categories.index')->with('status', 'Category updated!');
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'Category destroyed!');
    }
}
