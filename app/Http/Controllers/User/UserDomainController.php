<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user_dmain;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iodev\Whois\Factory;
class UserDomainController extends Controller
{
    public function domain_list()
    {
        $domains = user_dmain::where('user_id',Auth::user()->id)->paginate(10);
        return view('user.domains.domainList',compact('domains'));
    }

    public function domain_create()
    {
        return view('user.domains.domainCreate');
    }

    public function domain_save(Request $request)
    {
        $whois = Factory::get()->createWhois();

        $info = $whois->loadDomainInfo($request->domain_name);

        if ($info){
            $user_domain_save = new user_dmain();
            $user_domain_save->user_id = Auth::user()->id;
            $user_domain_save->domain_name = $request->domain_name;
            $user_domain_save->domain_create_date = Carbon::parse($info->creationDate)->format('Y-m-d');
            $user_domain_save->domain_exp_date = Carbon::parse($info->expirationDate)->format('Y-m-d');
            $user_domain_save->domain_owner = $info->registrar;
            $user_domain_save->save();

            return back()->with('success','Domain Successfully Added');
        }else{
            return back()->with('success','Domain Successfully Added');
        }





    }


}
