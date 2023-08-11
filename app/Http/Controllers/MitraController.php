<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use App\Models\Withdraws;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    public function manageWithdraw()
    {
        $user = Auth::user();
        $withdraws = Withdraws::with('bank.user')
            ->whereHas('bank.user', function ($query) use ($user) {
                $query->where('role_id', 3)
                    ->where('id', $user->id);
            })
            ->get();

        return view('pages.mitra.pages.withdraw.rpwithdraw', compact('withdraws'));
    }

    public function addWithdraw(Request $request)
    {
        $user = Auth::user();

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'nominal' => 'required',
                'bank_id' => 'required',
            ];

            $customMessages = [
                'nominal.required' => 'Nominal harus diisi!!!',
                'bank_id.required' => 'Rekening harus diisi!!!',
            ];

            $this->validate($request, $rules, $customMessages);

            $withdraw = new Withdraws();
            $withdraw->nominal = $data['nominal'];
            $withdraw->status = 'diajukan';
            $withdraw->bank_id = $data['bank_id'];
            $withdraw->save();

            return redirect()->route('withdraw.get')->with('success_message_withdraw', 'Data withdraw berhasil diajukan');
        }

        $bankData = Banks::where('user_id', $user->id)->get();
        return view('pages.mitra.pages.withdraw.addwithdraw', compact('bankData'));
    }
}