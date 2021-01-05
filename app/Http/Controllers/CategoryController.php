<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $categories = Category::all();
        return view('inventory.category.manage')
        ->with('categories', $categories);
    }

    public function create()
    {
        return view('inventory.category.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string',
        ]);

        $category = new Category();
        $category->category_name=$request->category_name;
        $category->save();


        $notification = array(
            'message' => 'Category Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('category.index')->with($notification);
    }


    public function edit($id)
    {

        $category = Category::findOrFail($id);
        return view('inventory.category.edit')
        ->with('category', $category);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'category_name' => 'required|string',
        ]);
        $category = Category::findOrFail($request->id);
        $category->category_name = $request->category_name;
        $category->save();


        $notification = array(
            'message' => 'Category Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('category.index')->with($notification);
    }

    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Category Deleted successfully!',
            'alert-type' => 'error',
        );
        return redirect()->route('category.index')->with($notification);
    }
    public function unpublished($id)
    {
        $unpublished=Category::findOrFail($id);
        $unpublished->status=2;
        $unpublished->save();
        $notification = array(
            'message' => 'Category Unpublished successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('category.index')->with($notification);
    }

    public function published($id)
    {
        $published = Category::findOrFail($id);
        $published->status = 1;
        $published->save();
        $notification = array(
            'message' => 'Category Published successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('category.index')->with($notification);
    }

}
