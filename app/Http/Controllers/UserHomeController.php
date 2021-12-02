<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserHomeController extends Controller
{
    public function index()
    {
        return view('UserHome.pages.home');
    }
    public function login()
    {
        return view('UserHome.login.login');
    }
    public function PostLogin(Request $request)
    {
        $remember= $request->has('rememer') ? true : false;
        if (Auth::attempt([
                'email'=> $request->email,
                'password'=> $request->password
        ], $remember)) {
            return redirect()->to(route('home.index'));
        }
        return redirect()->to(route('home.login'));
    }
    public function register()
    {
        return view('UserHome.login.register');
    }
    public function PostRegister(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email' => ['unique:users,email',
                        'email',
                        'required'
                    ],
            'password' => 'min:8|max:20|required_with:confirm_password|same:confirm_password'
        ]);
        User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> $request->password,
        ]);
        return redirect()->to(route('home.index'));
    }
}
