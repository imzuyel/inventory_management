<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Pos;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
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
        $custommer = Customer::all();
        $categories = Category::all();
        $product_cart = Cart::content();;
        $cart_count=Cart::count();
        return view('inventory.pos.manage', [
            'products' => $products,
            'custommer' => $custommer,
            'categories' => $categories,
            'product_cart' => $product_cart,
            'cart_count' => $cart_count,

        ]);
    }
    public function add_cart(Request $request)
    {
        $add_product = array();
        $add_product['id'] = $request->id;
        $add_product['name'] = $request->name;
        $add_product['qty'] = $request->qty;
        $add_product['price'] = $request->price;
        $add_product['weight'] = $request->weight;
        $add_cart =  Cart::add($add_product);
        if ($add_cart) {
            $notification = array(
                'message' => 'Product Added successfully!',
                'alert-type' => 'info',
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'opps  Some things goes worng!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
    public function update_cart(Request $request)
    {
        $update_product = array();
        $update_product['qty'] = $request->qty;
        $update_cart =Cart::update($request->rowId, $update_product);
        if ($update_cart) {
            $notification = array(
                'message' => 'Product Updated successfully!',
                'alert-type' => 'info',
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'opps  Some things goes worng!',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
    public function delete_cart($rowId)
    {
        Cart::remove($rowId);
        $notification = array(
            'message' => 'Product Remove!',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
    }
    public function create_invoice(Request $request)
    {
        $this->validate($request, [
            'custommer_id' => 'required',

        ],[
            'custommer_id.required'=>"Select A customer First",
        ]);
        $contents=Cart::content();
        $customer=Customer::findOrFail($request->custommer_id);
        return view('inventory.pos.invoice',[
            'contents'=> $contents,
            'customer'=> $customer,
        ]);

    }

 

}
