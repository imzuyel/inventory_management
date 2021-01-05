<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
      $products = DB::table('products')
        ->join('suppliers', 'products.supplier_id', 'suppliers.id')
        ->join('categories', 'products.category_id', 'categories.id')
        ->select('products.*', 'suppliers.name', 'categories.category_name')
        ->latest()->get();
        return view('inventory.product.manage')
            ->with('products', $products);
    }

    public function create()
    {
       $catagories=Category::where('status',1)->get();
        $brands=Brand::where('status',1)->get();
        $supplier= Supplier::all();
        return view('inventory.product.add',[
            'catagories'=> $catagories,
            'brands'=>$brands,
            'supplier'=> $supplier,
        ]);
    }






    public function store(Request $request)
    {

        $this->validate($request, [
            'product_name' => 'required|string',
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'product_code' => 'required',
            'product_place' => 'required',
            'product_route' => 'required',
            'photo' => 'required',
            'buy_date' => 'required|string',
            'expire_date' => 'required|string',
            'buying_price' => 'required|integer',
            'selling_price' => 'required|integer',
        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->buy_date.' '.$request->product_name );
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->product_code = $request->product_code;
        $product->product_place = $request->product_place;
        $product->product_route = $request->product_route;
        $product->buy_date = $request->buy_date;
        $product->expire_date = $request->expire_date;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $product->photo = $this->uploadeImage($request);
        $product->save();

        $notification = array(
            'message' => 'product Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('product.create')->with($notification);
    }




    public function edit($id)
    {

        $product = product::findOrFail($id);
        $catagories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();
        $supplier = Supplier::all();
        $products = DB::table('products')
        ->join('suppliers', 'products.supplier_id', 'suppliers.id')
        ->join('categories', 'products.category_id', 'categories.id')
        ->where('products.id',$id)
        ->select('products.*', 'suppliers.name', 'categories.category_name')
        ->first();
        return view('inventory.product.edit',[
            'product'=>$product,
            'catagories'=> $catagories,
            'brands'=> $brands,
            'supplier'=> $supplier,

        ]);

    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'product_name' => 'required|string',
            'category_id' => 'required|integer',
            'supplier_id' => 'required|integer',
            'product_code' => 'required',
            'product_place' => 'required',
            'product_route' => 'required',
            'buy_date' => 'required|string',
            'expire_date' => 'required|string',
            'buying_price' => 'required|integer',
            'selling_price' => 'required|integer',
        ]);
        $product = product::findOrFail($request->id);
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->buy_date . ' ' . $request->product_name);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->supplier_id = $request->supplier_id;
        $product->product_code = $request->product_code;
        $product->product_place = $request->product_place;
        $product->product_route = $request->product_route;
        $product->buy_date = $request->buy_date;
        $product->expire_date = $request->expire_date;
        $product->buying_price = $request->buying_price;
        $product->selling_price = $request->selling_price;
        $file1 = $request->file("photo");
        if ($file1) {
            if (file_exists($file1)) { //If it exits, delete it from folder
                unlink($product->photo);
            }
            $product->photo = $this->uploadeImage($request);
        }
        $product->save();

        $notification = array(
            'message' => 'Product Updated successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('product.index')->with($notification);
    }

    public function destroy($id)
    {
       $dele= product::findOrFail($id);
        $image_finding = $dele->photo;
        if (file_exists($image_finding)) { //If it exits, delete it from folder
            unlink($image_finding);
        }
        $dele->delete();
        $notification = array(
            'message' => 'Product Deleted successfully!',
            'alert-type' => 'error',
        );
        return redirect()->route('product.index')->with($notification);
    }
    public function unpublished($id)
    {
        $unpublished = product::findOrFail($id);
        $unpublished->status = 2;
        $unpublished->save();
        $notification = array(
            'message' => 'product Unpublished successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('product.index')->with($notification);
    }

    public function published($id)
    {
        $published = product::findOrFail($id);
        $published->status = 1;
        $published->save();
        $notification = array(
            'message' => 'product Published successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('product.index')->with($notification);
    }





    //Uplode Image
    protected function uploadeImage($request)
    {
        $file = $request->file("photo");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid(4) . $file->getClientOriginalName();
        // Get Name
        $directory = 'inventory/product/images/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);

        Image::make($file)->resize(270, 270)->save($imageUrl);
        return $imageUrl;
    }
}
