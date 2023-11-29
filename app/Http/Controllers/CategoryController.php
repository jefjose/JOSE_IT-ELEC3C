<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        $users = User::all();
        return view("category.category",compact("categories","users"));
    }

    public function form(){
        return view("category.categoryForm");
    }

    public function store(request $request){
        $categories = Category::all();  
        $users = User::all();

        $data = $request->validate([
            'category_name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = $request->file('image')->store('category_images', 'public');
            $data['image'] = $imagePath;
        }
        else {
            return redirect()->back()->with('error', 'File upload failed: ' . $request->file('image')->getErrorMessage());
        }

        Category::create($data);

        return redirect()->route('category')->with('success','');  
    }

    public function destroy($id)
    {
        // Find the application by ID
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('category')->with('error', 'Category not found.');
        }

        // Delete the application
        $category->delete();

        return redirect()->route('category')->with('success', 'Succesfully Deleted');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('category')->with('error', 'Category not found.');
        }

        return view('category.categoryFormEdit', compact('category'));
    }

    // public function update($id)
    // {
    //     $category = Category::find($id);

    //     if (!$category) {
    //         return redirect()->route('category')->with('error', 'Category not found.');
    //     }

    //     return view('category.categoryFormEdit', compact('category'));
    // }

    public function update(Request $request, Category $category)
{
    $validator = Validator::make($request->all(), [
        'category_name' => 'required|string',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = $request->all();

    if ($request->hasFile('image')) {
        if ($category->image) {
            \Storage::disk('public')->delete($category->image);
        }

        $imagePath = $request->file('image')->store('category_images', 'public');
        $data['image'] = $imagePath;
    }

    $category->update($data);

    return redirect(route('category'))->with('success', 'Category updated successfully');
}

public function restore($id) 
{
    $category = Category::withTrashed()->find($id)->restore();
    return redirect(route('category'))->with('success', 'Category updated successfully');
}

}
