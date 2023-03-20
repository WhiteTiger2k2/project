<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('admin')->attempt($data)) {
            return Redirect::route('admin.home');
        }
        return redirect()->back();
        // if(Auth::attempt([
        //     'email' => $request->input('email'),
        //     'password' => $request->input('password')
        // ], $request->input('remember'))) {
        //     return Redirect::route('admin');
        // }
        
    }

    public function logout()
    {
        if(Auth::logout()){
            return redirect::route('admin.login');
        }
        return Redirect::route('admin');
    }
}
