<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryPostRequest;
use App\Subcategory;


class SubcategoryController extends Controller
{

    public function index()
    {
        $subcategories = Subcategory::all();
        return view('subcategories.index', compact('subcategories'));
    }

    public function show(Request $request, Subcategory $subcategory)
    {
        return view('subcategories.show', compact('subcategory'));
    }

    public function create()
    {
        return view('subcategories.create');
    }

    public function store(SubcategoryPostRequest $request)
    {
        $data = $request->validated();
        $subcategory = Subcategory::create($data);
        return redirect()->route('subcategories.index')->with('status', 'Subcategory created!');
    }

    public function edit(Request $request, Subcategory $subcategory)
    {
        return view('subcategories.edit', compact('subcategory'));
    }

    public function update(SubcategoryPostRequest $request, Subcategory $subcategory)
    {
        $data = $request->validated();
        $subcategory->fill($data);
        $subcategory->save();
        return redirect()->route('subcategories.index')->with('status', 'Subcategory updated!');
    }

    public function destroy(Request $request, Subcategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('status', 'Subcategory destroyed!');
    }
}
