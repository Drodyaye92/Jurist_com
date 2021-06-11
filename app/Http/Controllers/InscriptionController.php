<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;



class InscriptionController extends Controller
{
    //
    public function inscription (Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'=>['required'],
        ]);
$users = new User();
$users->name = $request->input('name');
$users->email = $request->input('email');
$users->password = Hash::make (request('password'));
$users->phone = $request->input('phone');
$users->save();
return view('auth.login');
    }
}
