<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\user_dmain;
use App\Models\user_domain_folder;
use App\Models\user_folder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iodev\Whois\Factory;
class UserDomainController extends Controller
{
    public function domain_list()
    {
        $domains = user_dmain::where('user_id',Auth::user()->id)->paginate(10);
        $folders = user_folder::where('user_id',Auth::user()->id)->get();
        return view('user.domains.domainList',compact('domains','folders'));
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

    public function domain_delete(Request $request)
    {
        $domain_delete = user_dmain::where('id',$request->domain_del_id)->first();
        $domain_delete->delete();
        return back()->with('success','Domain Successfully Deleted');

    }


    public function domain_folder_save(Request $request)
    {
        $domain_id = $request->domain_id;
        $folder_id = $request->folder_id;


        foreach ($folder_id as $folder)
        {
            foreach ($domain_id as $domain){
                $new_fold_dm = new user_domain_folder();
                $new_fold_dm->user_id = Auth::user()->id;
                $new_fold_dm->domain_id = $domain;
                $new_fold_dm->folder_id = $folder;
                $new_fold_dm->save();
            }
        }

        return 'success';



    }




    public function folders()
    {
        $folders = user_folder::where('user_id',Auth::user()->id)->paginate(10);
        return view('user.folders.folderList',compact('folders'));
    }

    public function folder_create()
    {
        $folders = user_folder::where('user_id',Auth::user()->id)->paginate(10);
        return view('user.folders.folderCreate',compact('folders'));
    }

    public function folder_save(Request $request)
    {
        $new_folder = new user_folder();
        $new_folder->user_id = Auth::user()->id;
        $new_folder->folder_name = $request->folder_name;
        $new_folder->save();
        return back()->with('success','Folder Successfully Created');

    }


    public function folder_update(Request $request)
    {
        $update_folder = user_folder::where('id',$request->folder_edit)->first();
        $update_folder->folder_name = $request->folder_name;
        $update_folder->save();
        return back()->with('success','Folder Successfully Updated');
    }


    public function folder_delete(Request $request)
    {
        $folder_delete = user_folder::where('id',$request->folder_del_id)->first();
        $folder_delete->delete();
        return back()->with('success','Folder Successfully Deleted');
    }


    public function user_whois_checker()
    {
        return view('user.checker.whoIsChecker');
    }


    public function user_whois_checldata(Request $request)
    {
        $whois = Factory::get()->createWhois();
        $response = $whois->lookupDomain($request->dom_name);
        return $response->text;
    }









}
