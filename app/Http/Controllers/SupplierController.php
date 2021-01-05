<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $suppliers = supplier::all();
        return view('inventory.supplier.manage')
            ->with('suppliers', $suppliers);
    }

    public function create()
    {
        return view('inventory.supplier.add');
    }





    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:suppliers',
            'address' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'shop' => 'required',
            'account_holder' => 'string|',
            'account_number' => 'integer|',
            'bank_name' => 'string|',
            'bank_branch' => 'string|',
            'city' => 'required',

        ]);

        $supplier = new supplier();
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->type = $request->type;
        $supplier->shop = $request->shop;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->bank_branch = $request->bank_branch;
        $supplier->city = $request->city;
        $supplier->photo = $this->uploadeImage($request);
        $supplier->save();


        $notification = array(
            'message' => 'supplier Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('supplier.index')->with($notification);
    }
    public function edit($id)
    {
        $supplier = supplier::find($id);

        return view('inventory.supplier.edit')
            ->with('supplier', $supplier);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'shop' => 'required',
            'account_holder' => 'string|',
            'account_number' => 'integer',
            'bank_name' => 'string|',
            'bank_branch' => 'string|',
            'city' => 'required',

        ]);
        $supplier = supplier::findOrFail($request->id);
        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->type = $request->type;
        $supplier->shop = $request->shop;
        $supplier->account_holder = $request->account_holder;
        $supplier->account_number = $request->account_number;
        $supplier->bank_name = $request->bank_name;
        $supplier->bank_branch = $request->bank_branch;
        $supplier->city = $request->city;
        $file1 = $request->file("photo");
        if ($file1) {
            if (file_exists($file1)) { //If it exits, delete it from folder
                unlink($supplier->photo);
            }
            $supplier->photo = $this->uploadeImage($request);
        }
        $supplier->save();
        $notification = array(
            'message' => 'Supplier Update successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('supplier.index')->with($notification);
    }

    public function destroy($id)
    {
        $supplier = supplier::findOrFail($id);
        $image_finding = $supplier->photo;
        if (file_exists($image_finding)) { //If it exits, delete it from folder
            unlink($image_finding);
        }
        $supplier->delete();
        $notification = array(
            'message' => 'Supplier Deleted successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('supplier.index')->with($notification);
    }



    //Uplode Image
    protected function uploadeImage($request)
    {
        $file = $request->file("photo");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'inventory/suppliers/images/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);

        Image::make($file)->resize(270, 270)->save($imageUrl);
        return $imageUrl;
    }
}
