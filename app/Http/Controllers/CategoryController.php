<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Convert the name to lowercase and check if it exists
        $categoryName = strtolower($request->input('name'));
        $existingCategory = Category::where('name', $categoryName)->first();

        if ($existingCategory) {
            return redirect()->back()->withErrors(['name' => 'Category already exists.']);
        }

        // Create the new category
        $newCategory = Category::create([
            'name' => $categoryName,
        ]);

        if ($newCategory) {
            return redirect()->back()->with('success', 'Category created successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to create category.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }
    
    public function update(Request $request, Category $category)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($category->id);
        $category->update([
            'name' => strtolower($request->input('name')),
        ]);
        return redirect()->back()->with('success', 'Category created successfully.');
    }

    public function destroy(Request $request)
    {   
        $category = Category::findOrFail($request->category_id);

        if ($request->confirm_name !== ucwords($category->name)) {
            return redirect()->back()->withErrors(['confirm_name' => 'Confirmation category name does not match.']);
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');
    }
}