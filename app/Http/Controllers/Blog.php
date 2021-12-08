<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Illuminate\Http\Request;

class Blog extends Controller
{
    function index(){
        $data= Blogs::paginate(6);
        return view('UserHome.pages.blog',compact('data'));
    }
}