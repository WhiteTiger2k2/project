<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(LoginRequest $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('user')->attempt($data)) {
            return Redirect::route('home');
        }
        return redirect()->back();
        
    }

    protected function authenticated()
    {
        if(Auth::user()->role == '1') //1 = Admin Login
        {
            return Redirect::route('admin.home');
        }
        elseif(Auth::user()->role == '0') // Normal or Default User Login
        {
            return Redirect::route('home');
        }
    }
}
