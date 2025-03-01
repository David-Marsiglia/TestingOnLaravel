<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Category\CategoryRequest;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::get();
		if(!$request->ajax()) return view('index');
		return response()->json(['categories' => $categories], 200);
    }

    public function store(CategoryRequest $request)
    {
        $category = new Category($request->all());
		$category->save();
		if(!$request->ajax()) return back()->with(['success', 'Category created']);
		return response()->json(['status' => 'Category created', 'category' => $category], 201);
    }

	public function getAll()
	{
		$categories = Category::query();
		return DataTables::of($categories)->toJson();
	}

    public function show(Request $request, Category $category)
    {
		if (!$request->ajax()) return view('index');
		return response()->json(['category' => $category], 200);
    }

    public function update(CategoryRequest $request, Category $category)
    {
		$category->update($request->all());
		if(!$request->ajax()) return back()->with(['success', 'Category update']);
		return response()->json([], 204);
    }

    public function destroy(Request $request, Category $category)
    {
        $category->delete();
		if(!$request->ajax()) return back()->with('success', 'Category deleted');
		return response()->json([], 204);
    }
}
