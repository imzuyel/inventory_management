<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $salaries = Employee::all();
        return view('inventory.salary.manage')
        ->with('salaries', $salaries);
    }
    public function index_advance()
    {
      $salaries = DB::table('salaries')
        ->join('employees', 'salaries.employee_id', 'employees.id',)
        ->select('salaries.*', 'employees.name' ,'employees.salary', 'employees.photo')
        ->orderBy('month','DESC')->get();
        $salaries=Employee::all();
        return view('inventory.salary.manage_advance')
            ->with('salaries', $salaries);
    }

    public function create()
    {
        $employees = Employee::all();
        return view('inventory.salary.add')->with('employees', $employees);
    }
    public function create_advance()
    {
        $employees = Employee::all();
        return view('inventory.salary.create_advance')->with('employees', $employees);
    }





    public function store(Request $request)
    {
        $this->validate($request, [
            'employee_id' => 'required|integer',
            'month' => 'required|string',
            'year' => 'required|integer',
            'advance_salary' => 'required|integer',
        ]);

        $salary = new Salary();


        $notification = array(
            'message' => 'salary Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('salary.index')->with($notification);
    }

    public function store_advance(Request $request)
    {

        $this->validate($request, [
            'employee_id' => 'required|integer',
            'month' => 'required|string|',
            'year' => 'required|integer',
            'advance_salary' => 'required|integer',
        ]);;
        $employee_id = $request->employee_id;
        $month = $request->month;
        $year = $request->year;
        $advance = Salary::where('employee_id', $employee_id)->where('month', $month)->where('year', $year)->first();
        $advance_salary = new Salary();
        if ($advance === NULL) {
            $advance_salary->employee_id = $request->employee_id;
            $advance_salary->month = $request->month;
            $advance_salary->year = $request->year;
            $advance_salary->advance_salary = $request->advance_salary;
            $advance_salary->save();
            $notification = array(
                'message' => 'Advance salary added successfully!',
                'alert-type' => 'info',
            );
            return redirect()->route('salary.index')->with($notification);
        } else {
            $notification = array(
                'message' => 'Advance salary has alreadey given ' . $month . ' in ' . $year . ' given !',
                'alert-type' => 'error',
            );
            return redirect()->route('salary.index')->with($notification);
        };
    }



    public function edit($id)
    {
    }

    public function update(Request $request)
    {
    }

    public function destroy($id)
    {
    }
}
