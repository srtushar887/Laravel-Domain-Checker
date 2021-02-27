<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomLoginController extends Controller
{
    public function user_login()
    {
        return view('auth.login');
    }


    public function user_login_submit(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required|min:8'
        ]);
        if(Auth::guard('web')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
            return redirect(route('dashboard'));
        }

        return redirect()->back();
    }



    public function user_register()
    {
        return view('auth.register');
    }

    public function user_register_save(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->ver_code = Str::random(16).time().Str::random(5).rand(00000,99999);
        $user->account_status = 0;
        $user->account_type = 0;
        $user->save();

        return redirect(route('user.login'))->with('success','Account Successfully Created');

    }


}
