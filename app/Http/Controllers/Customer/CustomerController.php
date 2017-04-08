<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function showInfo()
    {
        return view('customers.customer_info');
    }

    public function changePassword(Request $request)
    {
    	$customer = Auth::user();
    	if (Hash::check($request->current_password, $customer->password))
    	{
    		 $customer->password = bcrypt($request->password);
        	 $customer->save();
        	 return redirect()->back()->with('statusChangePwd', 'success');
    	}
    	return redirect()->back()->with('statusChangePwd', 'fail');
    }
}
