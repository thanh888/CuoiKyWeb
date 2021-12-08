<?php

namespace App\Http\Controllers;

use App\Models\Tin;
use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function index()
    {
        $tin = Tin::paginate(3);
        return view('UserHome.profile.index', compact('tin'));
    }
    public function postings()
    {
        $post= Tin::where('user_id', auth()->user()->id)->get();
        return view('UserHome.profile.postings', compact('post'));
    }
}
