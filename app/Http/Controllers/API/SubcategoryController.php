<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryPostRequest;
use App\Http\Controllers\Controller;
use App\Subcategory;

class SubcategoryController extends Controller
{


    public function index()
    {
        return Subcategory::all();
    }

    public function show(Request $request, Subcategory $subcategory)
    {
        return $subcategory;
    }

    public function store(SubcategoryPostRequest $request)
    {
        $data = $request->validated();
        $subcategory = Subcategory::create($data);
        return $subcategory;
    }

    public function update(SubcategoryPostRequest $request, Subcategory $subcategory)
    {
        $data = $request->validated();
        $subcategory->fill($data);
        $subcategory->save();

        return $subcategory;
    }

    public function destroy(Request $request, Subcategory $subcategory)
    {
        $subcategory->delete();
        return $subcategory;
    }

}
