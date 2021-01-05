<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Customer;
class CustommerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $custommers = Customer::all();
        return view('inventory.custommer.manage')
            ->with('custommers', $custommers);
    }

    public function create()
    {
        return view('inventory.custommer.add');
    }

    public function store_modal(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email|string|unique:customers',
            'nid' => 'integer|unique:customers',
            'address' => 'required|string',
            'shop_name' => 'string|',
            'account_holder' => 'string|',
            'account_number' => 'integer|',
            'bank_name' => 'string|',
            'bank_branch' => 'string|',
            'city' => 'required',
            'phone' => 'required|string|unique:customers',

        ]);
        $custommer = new Customer();
        $custommer->name = $request->name;
        $custommer->email = $request->email;
        $custommer->nid = $request->nid;
        $custommer->phone = $request->phone;
        $custommer->address = $request->address;
        $custommer->shop_name = $request->shop_name;
        $custommer->account_holder = $request->account_holder;
        $custommer->account_number = $request->account_number;
        $custommer->bank_name = $request->bank_name;
        $custommer->bank_branch = $request->bank_branch;
        $custommer->city = $request->city;
        $custommer->photo = $this->uploadeImage($request);
        $custommer->save();


        $notification = array(
            'message' => 'custommer Added successfully!',
            'alert-type' => 'info',
        );
        return redirect()->back()->with($notification);
    }



    public function edit($id)
    {
        $custommers = Customer::find($id);

        return view('inventory.custommer.edit')
            ->with('custommer', $custommers);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'email',
            'nid' => 'integer',
            'address' => 'required|string',
            'account_holder' => 'string|',
            'account_number' => 'integer|',
            'bank_name' => 'string|',
            'bank_branch' => 'string|',
            'city' => 'required',
            'phone' => 'required|string|',

        ]);
      $custommer = Customer::findOrFail($request->id);
        $custommer->name = $request->name;
        $custommer->email = $request->email;
        $custommer->nid = $request->nid;
        $custommer->phone = $request->phone;
        $custommer->address = $request->address;
        $custommer->shop_name = $request->shop_name;
        $custommer->account_holder = $request->account_holder;
        $custommer->account_number = $request->account_number;
        $custommer->bank_name = $request->bank_name;
        $custommer->bank_branch = $request->bank_branch;
        $custommer->city = $request->city;
        $file1 = $request->file("photo");
        if ($file1) {
            if (file_exists($file1)) { //If it exits, delete it from folder
                unlink($custommer->photo);
            }
            $custommer->photo = $this->uploadeImage($request);
        }
        $custommer->save();
        $notification = array(
            'message' => 'custommer Update successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('custommer.index')->with($notification);
    }

    public function destroy($id)
    {
        $custommer = Customer::findOrFail($id);
        $image_finding = $custommer->photo;
        if (file_exists($image_finding)) { //If it exits, delete it from folder
            unlink($image_finding);
        }
        $custommer->delete();
        $notification = array(
            'message' => 'Custommer Deleted successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('custommer.index')->with($notification);
    }



    //Uplode Image
    protected function uploadeImage($request)
    {
        $file = $request->file("photo");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid() . $file->getClientOriginalName();
        // Get Name
        $directory = 'inventory/custommers/images/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);

        Image::make($file)->resize(270, 270)->save($imageUrl);
        return $imageUrl;
    }

}
