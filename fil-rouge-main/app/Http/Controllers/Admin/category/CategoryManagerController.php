<?php

namespace App\Http\Controllers\Admin\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class CategoryManagerController extends Controller
{
    public function index()
    {
        $categories = Category::with('image')->get();
        // dd($categories);
        return view('admin.category.categoriesManager', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|max:2048', // Max 2MB image file size
        ]);

        // Store the image file
        $imagePath = $this->storeImage($request->file('image'));

        // Create the category with validated data
        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // Create an image record in the images table
        Image::create([
            'path' => $imagePath,
            'imageable_id' => $category->id,
            'imageable_type' => Category::class,
        ]);

        return redirect()->back()->with('success', 'Category created successfully.');
    }

    private function storeImage($image)
    {
        $directory = 'images';
        return $image->store($directory, 'public');
    }

    public function edit($id)
{
    $category = Category::with('image')->findOrFail($id);
    return view('admin.category.editCategory', compact('category'));
}

public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048', // Max 2MB image file size
    ]);

    // Update the category with validated data
    $category->name = $request->name;
    $category->description = $request->description;

    // If a new image is uploaded, store it and update the image record
    if ($request->hasFile('image')) {
        $imagePath = $this->storeImage($request->file('image'));

        if ($category->image) {
            // Update the existing image record
            $category->image->update([
                'path' => $imagePath,
            ]);
        } else {
            // Create a new image record
            Image::create([
                'path' => $imagePath,
                'imageable_id' => $category->id,
                'imageable_type' => Category::class,
            ]);
        }
    }

    $category->save();

    return redirect()->back()->with('success', 'Category updated successfully.');
}


public function destroy($id)
{
    $category = Category::findOrFail($id);

    // Delete the associated image record, if exists
    if ($category->image) {
        $category->image->delete();
    }

    // Delete the category record
    $category->delete();

    return redirect()->back()->with('success', 'Category deleted successfully.');
}
}
