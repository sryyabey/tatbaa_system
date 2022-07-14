<?php

namespace App\Http\Controllers\Frontend;

use App\Models\CrmCustomer;
use App\Models\Randevu;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function index()
    {
        $customers = CrmCustomer::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(4);
        $from=date('Y-m-d')." 00:00:00";
        $to=date('Y-m-d')." 23:59:59";
        $randevular = Randevu::where([
            'user_id' => Auth::id()
        ])->whereBetween('date',[$from,$to])->get();

        return view('frontend.home',compact('customers','randevular'));
    }
}
