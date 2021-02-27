<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPlanController extends Controller
{
    public function plans()
    {
        return view('admin.plans.planList');
    }



}
