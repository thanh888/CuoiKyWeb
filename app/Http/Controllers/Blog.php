<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use App\Models\Need;
use Illuminate\Http\Request;

class Blog extends Controller
{
    function index(){
        $data1= Blogs::paginate(6);
        $datas= Need::all();
        $needs= [];
        foreach ($datas as $data ) {
            if ($datas->contains($data->parent_id)) {
                $needs[]= $data;
            }
        }
        return view('UserHome.pages.blog',compact('needs','data1'));
    }
    
}