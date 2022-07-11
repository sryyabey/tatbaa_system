<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersApiController extends Controller
{
    public function customers(Request $request){
       dd($request->all());
    }
}
