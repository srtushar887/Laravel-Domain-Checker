<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user_api_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function api_accounts()
    {
        return view('user.accounts.apiAccounts');
    }

    public function api_accounts_create()
    {
        return view('user.accounts.apiAccountCreate');
    }


    public function api_accounts_save(Request $request)
    {
        $new_acc = new user_api_account();
        $new_acc->user_id = Auth::user()->id;
        $new_acc->account_type = $request->account_type;
        $new_acc->account_name = $request->account_name;
        $new_acc->user_name = $request->user_name;
        $new_acc->api_key = $request->api_key;
        $new_acc->api_secret = $request->api_secret;
        $new_acc->save();
        return back()->with('success','Account Successfully Added');
    }


    public function user_upgrade_account(){
        return view('user.accounts.upgradeAccount');
    }



}
