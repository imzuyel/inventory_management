<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cost;

class CostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   $month="all";
        $costs = Cost::all();
        $total = Cost::all()->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }

    public function create()
    {
        return view('inventory.cost.add');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'details' => 'required|string',
            'cost_total_price' => 'required|integer',
        ]);
        $cost = new Cost();
        $cost->details = $request->details;
        $cost->cost_total_price = $request->cost_total_price;
        $cost->date = $request->date;
        $cost->month = $request->month;
        $cost->year = $request->year;
        $cost->save();


        $notification = array(
            'message' => 'Cost Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('cost.index')->with($notification);
    }


    public function edit($id)
    {

        $cost = Cost::findOrFail($id);
        return view('inventory.cost.edit')
            ->with('cost', $cost);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'details' => 'required|string',
            'cost_total_price' => 'required|integer',
        ]);
        $cost = Cost::findOrFail($request->id);
        $cost->details = $request->details;
        $cost->cost_total_price = $request->cost_total_price;
        $cost->date = $request->date;
        $cost->month = $request->month;
        $cost->year = $request->year;
        $cost->save();


        $notification = array(
            'message' => 'cost updated successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('cost.index')->with($notification);
    }

    public function destroy($id)
    {
        cost::findOrFail($id)->delete();
        $notification = array(
            'message' => 'cost Deleted successfully!',
            'alert-type' => 'error',
        );
        return redirect()->route('cost.index')->with($notification);
    }

    public function today()
    {
        $month=date('d-m-y');
        $costs = Cost::where('date', date('d-m-y'))->get();
        $total = Cost::where('date', date('d-m-y'))->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month'=>$month,
        ]);
    }
    public function this_month()
    {
        $month = date('F-y');
        $costs = Cost::where('month', date('F-y'))->get();
        $total = Cost::where('month', date('F-y'))->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function this_year()
    {
        $month = date('y');
        $costs = Cost::where('year', date('y'))->get();
        $total = Cost::where('year', date('y'))->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function january()
    {
        $month="January".date('-y');
        $costs = Cost::where('month', $month)->get();
        $total = Cost::where('month', 'January')->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }

    public function february()
    {
        $month ="february".date('-y');
        $costs = Cost::where('month',  $month)->get();
        $total = Cost::where('month',  $month)->sum('cost_total_price');
        return view('inventory.cost.february', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function march()
    {
        $month ='march'.date('-y');
        $costs = Cost::where('month', $month)->get();
        $total = Cost::where('month', $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function april()
    {
        $month ='april'.date('-y');
        $costs = Cost::where('month', $month)->get();
        $total = Cost::where('month', $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function may()
    {
        $month ='may'.date('-y');
        $costs = Cost::where('month',  $month)->get();
        $total = Cost::where('month',  $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function june()
    {
        $month ='june'.date('-y');
        $costs = Cost::where('month', $month)->get();
        $total = Cost::where('month', $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function july()
    {
        $month ='july'.date('-y');
        $costs = Cost::where('month', $month)->get();
        $total = Cost::where('month', $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function auguest()
    {
        $month ='auguest'.date('-y');
        $costs = Cost::where('month',  $month)->get();
        $total = Cost::where('month',  $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function september()
    {
        $month ='september'.date('-y');
        $costs = Cost::where('month', $month)->get();
        $total = Cost::where('month', $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function october()
    {
        $month = 'october'.date('-y');
        $costs = Cost::where('month',$month)->get();
        $total = Cost::where('month', $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function november()
    {
        $month = 'november'.date('-y');
        $costs = Cost::where('month',$month)->get();
        $total = Cost::where('month',$month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
    public function december()
    {   $month='december'.date('-y');
        $costs = Cost::where('month', $month)->get();
        $total = Cost::where('month', $month)->sum('cost_total_price');
        return view('inventory.cost.manage', [
            'costs' => $costs,
            'total' => $total,
            'month' => $month,
        ]);
    }
}
