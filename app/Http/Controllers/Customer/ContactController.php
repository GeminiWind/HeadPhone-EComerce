<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use App\Mail\ContactGiven;
use Validator;

class ContactController extends Controller
{
    public function handle(Request $request)
    {
    	 $messages = [
               'name.required'=>'Choose category for this post',
               'email.required'=>'Enter the tittle for this post',
               'subject.unique'=>'This tittle is already existing',
               'message.required'=>'Enter the content for this post',
        ];
        $validator = Validator:: make($request->all(),[
              'name' => 'required',
              'email'=>'required|email',
              'subject'=>'required',
              'message'=>'required',
        ], $messages);
        $myEmail = 'headphone@gmail.com';
        if ($validator->fails()) {
        	return back()->withErrors($validator)->withInput()->with('status','error');
        } else {
        	Mail::to($myEmail)->send(new ContactGiven($request));
        	return back()->with('status','success');
        }
       
    }
}
