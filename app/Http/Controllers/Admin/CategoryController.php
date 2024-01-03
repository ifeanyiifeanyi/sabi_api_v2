<?php

namespace App\Http\Controllers\Admin;

use App\Models\categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = categories::latest()->simplePaginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:categories|max:100|string|min:3',
            'description' => 'required|max:255|string',
        ]);
        $category = new categories();
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->save();
        return redirect()->route('category.view')->with('status', 'New Category Created');
    }
    public function edit($id)
    {
        $category = categories::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:100|string|min:3',
            'description' => 'required|max:255|string',
        ]);
        $category = categories::find($id);
        $category->name = $request->name;
         $category->slug = Str::slug($request->name);
        $category->description = $request->description;
        $category->update();
        return redirect()->route('category.view')->with('status', 'Category Update!');
    }

    public function destroy($id)
    {
        $category = categories::find($id);
        $category->delete();
        return redirect()->route('category.view')->with('status', 'Category Deleted!');

    }
}
