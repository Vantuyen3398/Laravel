<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLogin() {
    	return view('admin.login');
    }
    public function login(Request $request) {
    	$validator = Validator::make($request->all(),[
    		'username'=>'required',
    		'password'=>'required'
    	]);
    	if ($validator->fails()) {
    		return redirect() -> back()
    						  -> withErrors($validator)
    						  -> withInput();
    	}
    	$remember = $request->remember;
    	if (Auth::attempt(['username' => $request->username, 'password' => $request->password],$remember)) {
    		if (Auth::User()->role == 1) {
    			return view('admin.admin_layout');
    		} else {
    			return view('admin.login');
    		}
    	}
    }
}
