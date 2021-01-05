<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $setting = Setting::all();
        if (count($setting) > 0) {
            return view('inventory.setting.manage')
                ->with('setting', $setting);
        } else {
            $add_setting = new Setting();
            $add_setting->company_name = "Demo Company";
            $add_setting->company_address = "Demo address";
            $add_setting->company_email = "demo@gmail.com";
            $add_setting->company_phone = "10--------";
            $add_setting->company_logo = "inventory/setting/images/logo.png";
            $add_setting->save();
            return view('inventory.setting.manage')
                ->with('setting', $setting);
        }
    }

    public function edit($id)
    {
        $setting = Setting::findOrFail($id);
        return view('inventory.setting.edit')
            ->with('setting', $setting);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|string',
            'company_address' => 'required|string',
            'company_email' => 'required|email',
            'company_phone' => 'required|string',

        ]);
        $setting = Setting::findOrFail($request->id);
        $setting->company_name = $request->company_name;
        $setting->company_address = $request->company_address;
        $setting->company_email = $request->company_email;
        $setting->company_phone = $request->company_phone;

        $file = $request->file("company_logo");
        if ($file) {
            if (file_exists($file)) { //If it exits, delete it from folder
                unlink($setting->company_logo);
            }
            $setting->company_logo = $this->uploadeImage($request);
        }
        $setting->save();

        $notification = array(
            'message' => 'Setting Updated successfully!',
            'alert-type' => 'info',
        );
        return redirect()->route('setting.index')->with($notification);
    }

    //Uplode Image
    protected function uploadeImage($request)
    {
        $file = $request->file("company_logo");
        // Get Name
        $get_imageName = date('mdYHis') . uniqid(4) . $file->getClientOriginalName();
        // Get Name
        $directory = 'inventory/setting/images/';
        // Image Url
        $imageUrl = $directory . $get_imageName;
        // $file->move($directory, $imageUrl);

        Image::make($file)->resize(270, 270)->save($imageUrl);
        return $imageUrl;
    }
}
