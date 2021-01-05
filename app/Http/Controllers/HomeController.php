<?php

namespace App\Http\Controllers;
use App\Models\Cost;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $today=date('d-m-y');
        $total_today=Order::where('oder_date', $today)->get()
       ->sum('total');
        $tatal_order = Order::all();
        $tatal_product = Product::all();
        $costs = Cost::where('date', date('d-m-y'))->get()->sum('cost_total_price');
        $tatal_employee = Employee::all();
        $tatal_customer = Customer::all();
        return view('inventory.home.index',[
            'total_today'=> $total_today,
            'tatal_order'=> $tatal_order,
            'tatal_product'=> $tatal_product,
            'costs'=> $costs,
            'tatal_employee'=> $tatal_employee,
            'tatal_customer'=> $tatal_customer,
        ]);
    }

}
