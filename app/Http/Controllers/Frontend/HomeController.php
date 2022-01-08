<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CrmCustomer;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        $customers = CrmCustomer::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(4);

        return view('frontend.home',compact('customers'));
    }
}
