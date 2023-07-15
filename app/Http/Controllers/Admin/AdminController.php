<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        // echo $password = Hash::make('temantiketkita'); die;
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required'
            ];
            $customeMessages = [
                'email.required' => 'Email harus diisi!!!',
                'email.email' => 'Email tidak sesuai format!!!',
                'password.required' => 'Password harus diisi!!!',
            ];
            $this->validate($request, $rules, $customeMessages);

            if (Auth::guard('admin')->attempt([
                'email' => $data['email'],
                'password' => $data['password'],
                'status' => 1
            ])) {
                Session::flash('success_message', 'Berhasil Login');
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with("error_message", "Email atau Password tidak sesuai. Silahkan masukan data dengan benar!!!!!");
            }
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flash('success_message_logout', 'Berhasil Logout');
        return redirect('admin/login');
    }

    public function updateAdminPassword(Request $request)
    {
        // echo "<pre>"; print_r(Auth::guard('admin')->user()); die;
        if ($request->isMethod('POST')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            // check apakah current password yang di input sudah sesuai atau tidak
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                // check apakah new password sudah sesuai
                if ($data['confirm_password'] == $data['new_password']) {
                    Admin::where('id', Auth::guard('admin')->user()->id)->update([
                        'password' => bcrypt($data['new_password']),
                        'updated_at' => $data['updated_at']
                    ]);
                    return redirect()->back()->with('success_message_update_password', 'Password anda berhasil diperbarui');
                } else {
                    return redirect()->back()->with('error_message_update_password', 'Current Password dan Confirm Password yang anda masukan tidak sesuai!!!');
                }
            } else {
                return redirect()->back()->with('error_message_update_password', 'Current Password anda tidak sesuai!!!');
            }
        }
        $adminDetails = Admin::where('email', Auth::guard('admin')->user()->email)->first()->toArray();
        return view('admin.settings.update-admin-password')->with(compact('adminDetails'));
    }

    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();
        // echo "<pre>"; print_r($data); die;
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function updateAdminDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;
            $rules = [
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric'
            ];
            $customeMessages = [
                'admin_name.required' => 'Nama harus diisi!!!',
                'admin_name.regex' => 'Nama tidak sesuai format!!!',
                'admin_mobile.required' => 'Mobile Phone harus diisi!!!',
                'admin_mobile.numeric' => 'Mobile Phone tidak sesuai format (harus berupa angka)!!!',
            ];
            $this->validate($request, $rules, $customeMessages);
            // upload admin photo
            if ($request->hasFile('admin_image')) {
                $img_tmp = $request->file('admin_image');
                if ($img_tmp->isValid()) {
                    // get image extension
                    $extension = $img_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'store/admin/photo/' . $imageName;
                    // upload image
                    Image::make($img_tmp)->save($imagePath);
                }
            } else if (!empty($data['current_admin_image'])) {
                $imageName = $data['current_admin_image'];
            } else {
                $imageName = "";
            }
            // update admin details
            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'name' => $data['admin_name'],
                'mobile' => $data['admin_mobile'],
                'image' => $imageName,
                'updated_at' => $data['updated_at']
            ]);
            return redirect()->back()->with('success_message_update_details', 'Data anda berhasil diperbarui');
        }
        return view('admin.settings.update-admin-details');
    }

    public function updateVendorDetails($slug){
        if($slug == 'personal'){

        } else if($slug == 'business'){

        } else if($slug == 'bank'){

    }
    return view('admin.settings.update-vendor-details')->with(compact('slug'));
}
}