<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user_api_account;
use App\Models\user_dmain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {

        $api_acc_count = user_api_account::where('user_id',Auth::user()->id)->count();
        $domain_count = user_dmain::where('user_id',Auth::user()->id)->count();
        return view('user.index',compact('api_acc_count','domain_count'));
    }
}
