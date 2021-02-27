<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function users()
    {
        $users = User::orderBy('id','desc')->paginate(10);
        return view('admin.users.userList',compact('users'));
    }

    public function user_bill()
    {
        return view('admin.users.usersBill');
    }

}
