<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{

    //TODO user setting controllers
    public function index()
    {
        return view(
            'pages.user.pages.setting',
        );
    }
    public function updateInfo(Request $request)
    {
        // dd($request->all());
        // manual validation
        $err = [];

        // Email
        if ($request->has("user_email")) {
            if ($request->input("user_email") == null) {
                array_push($err, "Email User is Required!");
            }
            if (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $request->input("user_email"))) {
                array_push($err, "Email Type User is Invalid!");
            }
        }
        // Name
        if ($request->has("user_name")) {
            if ($request->input("user_name") == null) {
                array_push($err, "Name of User is Required!");
            }
        }
        if (!preg_match('/^[A-Za-z\\s]+$/', $request->input("user_name"))) {
            array_push($err, "Name Type of User is Invalid!");
        }
        // Phone
        if ($request->has("user_phone")) {
            if ($request->input("user_phone") == null) {
                array_push($err, "Phone Number of User is Required!");
            }
            if (!preg_match('/^[0-9]+$/', $request->input("user_phone"))) {
                array_push($err, "Phone Number of User is Invalid!");
            }
        }
        // Bord Date
        if ($request->has("user_date")) {
            if ($request->input("user_date") == null) {
                array_push($err, "Born Date of User is Required!");
            }
        }
        // Gender
        if ($request->has("user_gender")) {
            if ($request->input("user_gender") == null) {
                array_push($err, "Gender of User is Required!");
            }
        }
        // Address
        if ($request->has("user_address")) {
            if ($request->input("user_address") == null) {
                array_push($err, "Address of User is Required!");
            }
        }
        // Redirect
        if (count($err) != 0) {
            //return error
            return back()->with([
                'update_info_fail' => $err[0],
            ]);
        } else {
            // get user
            $id = Auth::user()->id;

            User::where("id", $id)
                ->update([
                    "name" => $request->user_name,
                    "no_telp" => $request->user_phone,
                    "born_date" => $request->user_bdate,
                    "gender" => $request->user_gender,
                    "address" => $request->user_address,
                ]);

            return back()->with(["update_info_success" => "Profile was successfully update!"]);
        }
    }

    public function updateAcc(Request $request)
    {
        // dd($request->all());

        // Validate
        $request->validate([
            'user_img' => 'file|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Get user
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $hashName = "";

        // dd($user->password);

        if ($request->hasFile('user_img')) {

            // check role
            switch ((int) Auth::user()->role_id) {
                case 3:
                    // Delete Old File
                    $imagePath = 'store/mitra/profile/' . $user->img_profile;
                    File::delete($imagePath);

                    $img = $request->file('user_img');
                    // get image extension
                    $img_name = $img->hashName();
                    $hashName = $img->hashName();
                    $imagePath = 'store/mitra/profile/';
                    // upload image
                    $img->move($imagePath, $img_name);

                    // Update User
                    $user->update([
                        'img_profile' => $hashName,
                        // "password" =>Hash::make($request->user_new_password),
                    ]);
                    break;

                default:
                    // Delete Old File
                    $imagePath = 'store/user/profile/' . $user->img_profile;
                    File::delete($imagePath);

                    $img = $request->file('user_img');
                    // get image extension
                    $img_name = $img->hashName();
                    $hashName = $img->hashName();
                    $imagePath = 'store/user/profile/';
                    // upload image
                    $img->move($imagePath, $img_name);

                    // Update User
                    $user->update([
                        'img_profile' => $hashName,
                        // "password" =>Hash::make($request->user_new_password),
                    ]);
                    break;
            }

        } else {
            // Update User without img
            // $user->update([
            //     "password" =>Hash::make($request->user_new_password),
            // ]);
        }

        return back()->with(["update_info_success" => "Profile was successfully update!"]);
    }
    //TODO END user setting controllers

    public function mitraIndex()
    {
        return view(
            'pages.mitra.pages.account.setting',
        );
    }
}
