<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Banks;
use App\Models\Events;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        Session::flash('success_message_logout', 'Berhasil Logout');
        return redirect('admin/login');
    }

    public function manageMitra()
    {
        $mitra = User::where('role_id', 3)->get();
        return view('pages.admin.pages.mitra.manage-mitra', compact('mitra'));
    }

    public function manageAdmin()
    {
        $admin = User::where('role_id', 2)->get();
        return view('pages.admin.pages.admin.manage-admin', compact('admin'));
    }

    public function manageEvent(){
        $event = Events::all();
        return view('pages.admin.pages.events.manage-event');
    }

    public function addMitra(Request $request)
    {
        $bankData = Banks::all();
    
        if ($request->isMethod('post')) {
            $data = $request->all();
    
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'no_telp' => 'required',
                'img_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            $customMessages = [
                'name.required' => 'Nama mitra harus diisi!!!',
                'email.required' => 'Email harus diisi!!!',
                'email.email' => 'Email tidak sesuai format!!!',
                'password.required' => 'Password harus diisi!!!',
                'no_telp.required' => 'Nomor Telepon harus diisi!!!',
                'img_profile.image' => 'File yang diupload harus berupa gambar.',
                'img_profile.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif.',
                'img_profile.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
            ];

            $this->validate($request, $rules, $customMessages);

            // upload mitra photo
            // if ($request->hasFile('img_profile')) {
            //     $img_tmp = $request->file('img_profile');
            //     if ($img_tmp->isValid()) {
            //         // get image extension
            //         $extension = $img_tmp->getClientOriginalExtension();
            //         // generate new image name
            //         $imageName = rand(111, 99999) . '.' . $extension;
            //         $imagePath = 'store/user/photo/' . $imageName;
            //         // upload image
            //         Image::make($img_tmp)->save(public_path($imagePath));
            //     }
            // }

            $mitra = new User();
            $mitra->role_id = 3;
            $mitra->bank_id = 0;
            $mitra->event_id = 0;
            $mitra->name = $data['name'];
            $mitra->email = $data['email'];
            $mitra->password = bcrypt($data['password']);
            $mitra->no_telp = $data['no_telp'];
            // if (isset($imageName)) {
            //     // Save the image name only if an image was uploaded
            //     $mitra->img_profile = $imageName;
            // }
            $mitra->img_profile = 0;
            $mitra->save();

            return redirect()->route('admin.manage.mitra')->with('success_message', 'Data mitra baru berhasil disimpan');
        }
        return view('pages.admin.pages.mitra.mitra', compact('bankData'));
    }
    
    public function addAdmin(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'no_telp' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Nama mitra harus diisi!!!',
                'email.required' => 'Email harus diisi!!!',
                'email.email' => 'Email tidak sesuai format!!!',
                'password.required' => 'Password harus diisi!!!',
                'no_telp.required' => 'Nomor Telepon harus diisi!!!',
            ];

            $this->validate($request, $rules, $customMessages);

            $mitra = new User();
            $mitra->role_id = 2;
            $mitra->bank_id = 0;
            $mitra->event_id = 0;
            $mitra->name = $data['name'];
            $mitra->email = $data['email'];
            $mitra->password = bcrypt($data['password']);
            $mitra->no_telp = $data['no_telp'];
            $mitra->img_profile = 0;
            $mitra->save();

            return redirect()->route('admin.manage.admin')->with('success_message', 'Data admin baru berhasil disimpan');
        }
        return view('pages.admin.pages.admin.admin');
    }

    public function editMitra(Request $request, $id)
    {
        try {
            // Fetch mitra data by ID
            $mitra = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            // jika id mitra tidak ditemukan redirect error message
            return redirect()->route('admin.manage.mitra')->with('error_message_not_found', 'Data Mitra tidak ditemukan');
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable',
                'no_telp' => 'required',
                'img_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ];

            $customMessages = [
                'name.required' => 'Nama mitra harus diisi!!!',
                'email.required' => 'Email harus diisi!!!',
                'email.email' => 'Email tidak sesuai format!!!',
                'password.required' => 'Password harus diisi!!!',
                'no_telp.required' => 'Nomor Telepon harus diisi!!!',
                'img_profile.image' => 'File yang diupload harus berupa gambar.',
                'img_profile.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif.',
                'img_profile.max' => 'Ukuran gambar tidak boleh lebih dari 2 MB.',
            ];

            if (!empty($data['password'])) {
                $rules['password'] = 'required';
                $customMessages['password.required'] = 'Password harus diisi!!!';
            }

            $validator = Validator::make($data, $rules, $customMessages);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Upload mitra photo
        //     if ($request->hasFile('img_profile')) {
        //         $img_tmp = $request->file('img_profile');
        //         if ($img_tmp->isValid()) {
        //             // Get image extension
        //             $extension = $img_tmp->getClientOriginalExtension();
        //             // Generate new image name
        //             $imageName = rand(111, 99999) . '.' . $extension;
        //             $imagePath = 'store/user/photo/' . $imageName;
        //             // Upload image
        //             Image::make($img_tmp)->save(public_path($imagePath));

        //             // Delete old image if it exists
        //             if ($mitra->img_profile && File::exists('store/user/photo/' . $mitra->img_profile)) {
        //                 File::delete('store/user/photo/' . $mitra->img_profile);
        //         }

        //             // Save the new image name to the database
        //             $mitra->img_profile = $imageName;
        //     }
        // }

            // Update mitra model with new data
            $mitra->name = $data['name'];
            $mitra->email = $data['email'];
            if (!empty($data['password'])) {
                $mitra->password = bcrypt($data['password']);
            }
            $mitra->no_telp = $data['no_telp'];
            $mitra->img_profile = 0;
            $mitra->save();

            return redirect()->route('admin.manage.mitra')->with('success_message_update', 'Data mitra berhasil diperbarui');
        }

        return view('pages.admin.pages.mitra.edit-mitra', compact('mitra'));
    }

    public function editAdmin(Request $request, $id)
    {
        try {
            // Fetch admin data by ID
            $admin = User::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            // jika id admin tidak ditemukan redirect error message
            return redirect()->route('admin.manage.admin')->with('error_message_not_found', 'Data admin tidak ditemukan');
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'nullable', 
                'no_telp' => 'required',
            ];

            $customMessages = [
                'name.required' => 'Nama mitra harus diisi!!!',
                'email.required' => 'Email harus diisi!!!',
                'email.email' => 'Email tidak sesuai format!!!',
                'password.required' => 'Password harus diisi!!!',
                'no_telp.required' => 'Nomor Telepon harus diisi!!!',
            ];

            if (!empty($data['password'])) {
                $rules['password'] = 'required';
                $customMessages['password.required'] = 'Password harus diisi!!!';
            }

            $this->validate($request, $rules, $customMessages);


            // Update mitra model with new data
            $admin->name = $data['name'];
            $admin->email = $data['email'];
            if (!empty($data['password'])) {
                $admin->password = bcrypt($data['password']);
            }
            $admin->no_telp = $data['no_telp'];
            $admin->save();

            return redirect()->route('admin.manage.admin')->with('success_message_update', 'Data admin berhasil diperbarui');
        }
        return view('pages.admin.pages.admin.edit-admin', compact('admin'));
    }

    public function deleteMitra($id)
    {
        try {
            // Fetch mitra data by ID
            $mitra = User::findOrFail($id);

            // Delete the mitra photo if it exists
            if ($mitra->img_profile && File::exists('store/user/photo/' . $mitra->img_profile)) {
                File::delete('store/user/photo/' . $mitra->img_profile);
            }

            // Delete the mitra data
            $mitra->delete();

            return redirect()->route('admin.manage.mitra')->with('success_message_delete', 'Data Mitra berhasil dihapus');
        } catch (QueryException $e) {
            // Periksa apakah pengecualian disebabkan oleh foreign key constraint violation
            if ($e->getCode() === '23000') {
                // Foreign key constraint violation message
                $errorMessage = "Tidak dapat menghapus Data Mitra karena terdapat data terkait dengan data lain.";
            } else {
                // Query exception messages lainnya
                $errorMessage = "Terjadi kesalahan dalam menghapus Data Mitra.";
            }

            return redirect()->route('admin.manage.mitra')->with('error_message_delete', $errorMessage);
        } catch (ModelNotFoundException $e) {
            // jika id mitra tidak ditemukan redirect error message
            return redirect()->route('admin.manage.mitra')->with('error_message_not_found', 'Data Mitra tidak ditemukan');
        }
    }

    public function deleteAdmin($id){
        try {
            // Fetch admin data by ID
            $admin = User::findOrFail($id);
            $admin->delete();

            return redirect()->route('admin.manage.admin')->with('success_message_delete', 'Data Admin berhasil dihapus');
        } catch (QueryException $e) {
            // Periksa apakah pengecualian disebabkan oleh  foreign key constraint violation
            if ($e->getCode() === '23000 ') {
                // Foreign key constraint violation message
                $errorMessage = "Tidak dapat menghapus Data Admin karena terdapat data terkait dengan data lain.";
            } else {
                // query exception messages lainnya
                $errorMessage = "Terjadi kesalahan dalam menghapus Data admin.";
            }

            return redirect()->route('admin.manage.admin')->with('error_message_delete', $errorMessage);
        } catch (ModelNotFoundException $e) {
            // jika id guru tidak ditemukan redirect error message
            return redirect()->route('admin.manage.admin')->with('error_message_not_found', 'Data Guru tidak ditemukan');
        }
    }
}