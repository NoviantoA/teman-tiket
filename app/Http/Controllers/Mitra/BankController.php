<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Events;
use App\Models\Banks;
use App\Models\User;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function get(){
        // Get user_id
        $userID = Auth::user()->id;

        // Get Bank Information
        $bank = Banks::where("user_id",$userID)->first();

        return view(
            'pages.mitra.pages.banks.bank',
            compact('bank')
        );
    }
    public function post(Request $request){
        $request->validate([
            'jenis_bank' => 'required',
            'nama_bank'=> 'string|regex:/^[a-zA-Z\\s]+$/u|nullable',
            'nama_wallet'=> 'string|regex:/^[a-zA-Z\\s]+$/u|nullable',
            'nomer_rekening'=> 'string|regex:/^[0-9]+$/u|nullable',
            'nomer_hp'=> 'string|regex:/^[0-9]+$/u|nullable',
            'nama_pemilik'=> 'required',
        ]);

        // Get user_id
        $userID = Auth::user()->id;

        // Insert Bank Information
        Banks::create([
            "user_id"=> $userID,
            "bank_type"=> $request->jenis_bank,
            "bank_nomer_rekening"=> $request->nomer_rekening,
            "bank_nomer_hp"=> $request->nomer_hp,
            "bank_name"=> $request->nama_bank == null ? $request->nama_wallet:$request->nama_bank,
            "bank_name_user"=> $request->nama_pemilik,
            "bank_is_verified"=> 0,
        ]);
        //redirect to index
        return back()->with(['create_bank_success' => 'Bank Created Successfully']);
    }

    public function update($id, Request $request){
        // Get Bank
        $bank = Banks::find($id);

        // dd($bank->bank_name);
        // dd($request->all());
        $request->validate([
            'nama_bank'=> 'string|regex:/^[a-zA-Z\\s]+$/u|nullable',
            'nama_wallet'=> 'string|regex:/^[a-zA-Z\\s]+$/u|nullable',
            'nomer_rekening'=> 'string|regex:/^[0-9]+$/u|nullable',
            'nomer_hp'=> 'string|regex:/^[0-9]+$/u|nullable',
            'nama_pemilik'=> 'required',
        ]);

        // Update on table

        if ($bank->bank_name == $request->nama_bank) {
            $bank->update([
                "bank_nomer_rekening"=> $request->nomer_rekening,
                "bank_nomer_hp"=> $request->nomer_hp,
                "bank_name"=> $request->nama_wallet,
                "bank_name_user"=> $request->nama_pemilik,
                "bank_is_verified"=> 0,
            ]);
            //redirect to index
            return back()->with(['update_bank_success' => 'Bank Update Successfully']);
        }
        if ($bank->bank_name == $request->nama_wallet) {
            $bank->update([
                "bank_nomer_rekening"=> $request->nomer_rekening,
                "bank_nomer_hp"=> $request->nomer_hp,
                "bank_name"=> $request->nama_bank,
                "bank_name_user"=> $request->nama_pemilik,
                "bank_is_verified"=> 0,
            ]);
            //redirect to index
            return back()->with(['update_bank_success' => 'Bank Update Successfully']);
        }
        
    }

    public function delete($id, Request $request){
        // Delete Bank
        $bank = Banks::find($id)->delete();

        //redirect to index
        return back()->with(['delete_bank_success' => 'Bank Deleted Successfully']);
    }
}
