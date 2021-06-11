<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Middleware;
use App\User;


class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);

    }

    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login(Request $request){
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to thier intended location
            //return redirect()->intended(route('admin'));
           // return view('dashb');
           return redirect()->route('dasb');
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
    public function dash(){
        $user = User::all();
         return view('admin',compact('user'));
       }
       public function admin(){

         return view('dash')->with(['users'=>User::all()]);
       }

       public function supprime(Request $request){
        $email = $request->input('supprime');

       DB::delete('delete from users where email=?',[$email]);


        return redirect()->route('admin');
      }

}
