<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
      return view('auth.adminlogin');
    }

    public  function login(Request $request)
    {
      //validate
      $this->validate($request,
      [
        'email'=>'required|email',
        'password'=>'required|min:6',

      ]);

      if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember))
      {
        return redirect()->intended(route('admindashboard'));

      }
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
