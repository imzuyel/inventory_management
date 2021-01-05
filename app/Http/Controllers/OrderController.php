<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $success = DB::table('orders')
        ->join('customers', 'orders.customer_id', 'customers.id')
        ->where('oder_status', 'approve')
        ->select('customers.name', 'orders.*')
        ->get();
        return view('inventory.pos.successorder', [
            'success' => $success,
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'customer_id' => 'required',
            'payment_status' => 'required',
            'pay' => 'required',
            'due' => 'required',
            'oder_date' => 'required',
        ], [
            'payment_status.required' => "Select A payment status First",
            'pay.required' => "Select Pay amount",
            'due.required' => "Select due amount",
        ]);
        $add_product = array();
        $add_product['customer_id'] = $request->customer_id;
        $add_product['oder_date'] = $request->oder_date;
        $add_product['oder_status'] = $request->oder_status;
        $add_product['total_product'] = $request->total_product;
        $add_product['subtotal'] = $request->subtotal;
        $add_product['vat'] = $request->vat;
        $add_product['total'] = $request->total;
        $add_product['payment_status'] = $request->payment_status;
        $add_product['pay'] = $request->pay;
        $add_product['due'] = $request->due;
        $order_id = DB::table('orders')->insertGetId($add_product);
        $contents = Cart::content();

        $odata = array();
        foreach ($contents as $content) {
            $odata['order_id'] = $order_id;
            $odata['product_id'] = $content->id;
            $odata['quantity'] = $content->qty;
            $odata['unit_cost'] = $content->price;
            $odata['total'] = $content->total;
            $insert = DB::table('orderdetails')->insert($odata);
        }


        $notification = array(
            'message' => 'Invoice Created Successfully Please delivar product on date!',
            'alert-type' => 'info',

        );
        Cart::destroy();
        return redirect()->route('home')->with($notification);
    }

    public function pendding()
    {
        $penddings = DB::table('orders')
            ->join('customers', 'orders.customer_id', 'customers.id')
            ->where('oder_status', 'pendding')
            ->select('customers.name', 'orders.*')
            ->get();
        return view('inventory.pos.pendding', [
            'penddings' => $penddings,
        ]);
    }
    public function views($id)
    {

        $order = DB::table('orders')
            ->join('customers', 'customers.id', 'orders.customer_id')
            ->where('orders.id', $id)
            ->select('orders.*', 'customers.name', 'customers.address', 'customers.email', 'customers.phone')
            ->first();

        $order_details = DB::table('orderdetails')
            ->join('products', 'orderdetails.product_id', 'products.id')
            ->where('order_id', $id)
            ->get();
        return view('inventory.pos.confirmorder', [
            'order' => $order,
            'order_details' => $order_details,
        ]);
    }



    public function done($id)
    {
        $approve = Order::find($id);
        $approve->oder_status = "approve";
        $approve->save();

        //   $approve=DB::table('orders')->where('id',$id)->update(['oder_status'=> 'approve']);

        if ($approve) {
            $notification = array(
                'message' => 'Succesfully order confirm!',
                'alert-type' => 'info',
            );
            return redirect()->route('order.pendding')->with($notification);
        } else {
            $notification = array(
                'message' => 'Opps! something goes wrong',
                'alert-type' => 'error',
            );
            return redirect()->back()->with($notification);
        }
    }
}
