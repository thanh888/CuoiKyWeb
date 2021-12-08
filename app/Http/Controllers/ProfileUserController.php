<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use App\User;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function index()
    {
        $profile= User::find(auth()->id());
        return view('UserHome.profile.index', compact('profile'));
        // return view('UserHome.profile.index');
    }
    function update(){
        $profile= User::find(auth()->id());
        return view('UserHome.Profile.update', compact('profile'));
    }
    function postupdate(Request $request){
        $data= User::find($request->id);
        $data->fullname=$request->fullname;
        $data->description=$request->description;
        $data->linkfb=$request->linkfb;
        $data->phone=$request->phone;
        $data->location=$request->location;
        $data->save();
        return redirect(route('profile.index'));
    }
    public function postings()
    {
        $post= Tin::where('user_id', auth()->user()->id)->get();
        return view('UserHome.profile.postings', compact('post'));
    }
}