<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $employees = Employee::all();
        return view('inventory.employee.manage')
            ->with('employees', $employees);
    }

    public function create()
    {
        return view('inventory.employee.add');
    }





    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'nid' => 'required|integer|unique:employees',
            'address' => 'required|string',
            'expreience' => 'string|required',
            'salary' => 'required|integer',
            'vacation' => 'required|',
            'city' => 'required',
            'phone' => 'required',

        ]);

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->nid = $request->nid;
        $employee->address = $request->address;
        $employee->expreience = $request->expreience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->phone = $request->phone;
        $employee->photo = $this->uploadeImage($request);
        $employee->save();


        $notification = array(
            'message' => 'Employee Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('employee.index')->with($notification);
    }
    public function edit($id)
    {
        $employees = Employee::find($id);

        return view('inventory.employee.edit')
        ->with('employee', $employees);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string',
            'nid' => 'required|integer',
            'address' => 'required|string',
            'expreience' => 'string|required',
            'salary' => 'required|integer',
            'vacation' => 'required|',
            'city' => 'required',
            'phone' => 'required',

        ]);
        $employee = Employee::findOrFail($request->id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->nid = $request->nid;
        $employee->address = $request->address;
        $employee->expreience = $request->expreience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->phone = $request->phone;
        $file1 = $request->file("photo");
        if ($file1) {
            if (file_exists($file1)) { //If it exits, delete it from folder
                unlink($employee->photo);
            }
            $employee->photo = $this->uploadeImage($request);
        }
        $employee->save();
        $notification = array(
            'message' => 'Employee Update successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('employee.index')->with($notification);
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $image_finding = $employee->photo;
        if (file_exists($image_finding)) { //If it exits, delete it from folder
            unlink($image_finding);
        }
        $employee->delete();
        $notification = array(
            'message' => 'Employee Deleted successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('employee.index')->with($notification);
    }



//Uplode Image
    protected function uploadeImage($request)
    {
        $file = $request->file("photo");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'inventory/employees/images/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);

        Image::make($file)->resize(270, 270)->save($imageUrl);
        return $imageUrl;
    }

}
