<?php

namespace App\Http\Controllers;

use App\Models\InforUserPosting;
use App\User;
use App\Models\Blogs;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Tin;
use App\Models\Need;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserHomeController extends Controller
{
    private $slider;
    private $postings;
    private $need;
    public function __construct(Slider $slider, Tin $posting)
    {
          $this->slider=$slider;
          $this->posting=$posting;
         
    }
    public function index()
    {
        $blogs = Blogs::all()->take(3);
        $slider=$this->slider->all();
        $postings= Tin::all();
        $datas= Need::all();
        $needs= [];
        foreach ($datas as $data ) {
            if ($datas->contains($data->parent_id)) {
                continue;
            }
            $needs[]= $data;
        }
        
        $tinnew=$this->posting->latest()->take(3)->get();
         $slider=$this->slider->all();
         $postings= Tin::all();
         $blogs=Blogs::all();
        //  dd($postings->images->name);
        return view('UserHome.pages.home',compact('slider','blogs', 'postings','tinnew','needs'));
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
        return redirect()->to(route('home.login'));
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->to(route('home.index'));

    }
    public function loadneed($id)
    {
        $datas= Need::all();
        $needs= [];
        foreach ($datas as $data ) {
            if ($datas->contains($data->parent_id)) {
                continue;
            }
            $needs[]= $data;
        }
        $slider=$this->slider->all();
      $tin=Tin::where('need_id',$id)->get();
      return view('UserHome.pages.loadneed',compact('needs','tin','slider'));
    }
}