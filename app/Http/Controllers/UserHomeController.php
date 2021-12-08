<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Tin;

class UserHomeController extends Controller
{
    private $slider;
    public function __construct(Slider $slider,Tin $tin)
    {
          $this->slider=$slider;
          $this->tin=$tin;
    }
    public function index()
    {
        $tinnew=$this->tin->latest()->take(3)->get();
         $slider=$this->slider->all();
        return view('UserHome.pages.home',compact('slider','tinnew'));
    }
    public function login()
    {
        return view('UserHome.login.login');
    }
    public function PostLogin(Request $request)
    {
        $remember= $request->has('remember') ? true : false;
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
            'password'=> Hash::make($request-> password),
        ]);
        return redirect()->to(route('home.index'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to(route('home.index'));

    }
}
