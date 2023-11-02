<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Newsdetail;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $details= Newsdetail::all();
        return view('backend.categories.index', compact('categories','details'));
    }

    public function create()
    {
        return view('backend.categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|unique:categories,category_name',
            'status' => 'required|in:active,inactive',
            
        ]);

        // Automatically generate the slug from the name
        $slug = Str::slug($validatedData['category_name']);

        // Create a new category with the generated slug
        Category::create([
            'category_name' => $validatedData['category_name'],
            'slug' => $slug, // Automatically filled slug
            'status' => $validatedData['status'],
        ]);

        return redirect()->route('categories.index')->with('success', 'Category created successfully');
    }


   

public function edit(Category $category)
{
    return view('backend.categories.edit', compact('category'));
}

public function update(Request $request, Category $category)
{
    $validatedData = $request->validate([
        'category_name' => 'required|unique:categories,category_name,' . $category->id,
        'status' => 'required|in:active,inactive',
    ]);

    $category->update($validatedData);

    return redirect()->route('categories.index')
        ->with('success', 'Category updated successfully');
}

public function destroy(Category $category)
{
    $category->delete();

    return redirect()->route('categories.index')
        ->with('success', 'Category deleted successfully');
}


}
