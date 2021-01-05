<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $brands = Brand::all();
        return view('inventory.brand.manage')
            ->with('brands', $brands);
    }

    public function create()
    {
        return view('inventory.brand.add');
    }






    public function store(Request $request)
    {
        $this->validate($request, [
            'brand_name' => 'required|string',
        ]);

        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->save();

        $notification = array(
            'message' => 'Brand Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('brand.index')->with($notification);
    }




    public function edit($id)
    {

        $brand = Brand::findOrFail($id);
        return view('inventory.brand.edit')
            ->with('brand', $brand);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'brand_name' => 'required|string',
        ]);
        $brand = Brand::findOrFail($request->id);
        $brand->brand_name = $request->brand_name;
        $brand->save();


        $notification = array(
            'message' => 'brand Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('brand.index')->with($notification);
    }

    public function destroy($id)
    {
        Brand::findOrFail($id)->delete();
        $notification = array(
            'message' => 'brand Deleted successfully!',
            'alert-type' => 'error',
        );
        return redirect()->route('brand.index')->with($notification);
    }
    public function unpublished($id)
    {
        $unpublished = Brand::findOrFail($id);
        $unpublished->status = 2;
        $unpublished->save();
        $notification = array(
            'message' => 'brand Unpublished successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('brand.index')->with($notification);
    }

    public function published($id)
    {
        $published = Brand::findOrFail($id);
        $published->status = 1;
        $published->save();
        $notification = array(
            'message' => 'Brand Published successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('brand.index')->with($notification);
    }

}
