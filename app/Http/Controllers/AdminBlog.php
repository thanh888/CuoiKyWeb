<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Log;
use App\Models\Blogs;
use Illuminate\Http\Request;

class AdminBlog extends Controller
{
    function index(){
        $data = Blogs::all();
        return view('admin.blog.index',compact('data'));
    }
    function add(){
        return view('admin.blog.add');
    }
    function addstore(Request $request){
        $data= array();
        $data['title']= $request->title;
        $data['sologan']= $request->sologan;
        $data['description']= $request->description;

        $image= $request->file('image');
        if($image){
            $name_image = $image->getClientOriginalName();
            $new_image= $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image->move('upload',$new_image);
            $data['image']= $new_image;
            Blogs::create($data);
            return redirect(route('adminblog.index'));

        }  
    }
    function update($id){
        $data = Blogs::find($id);
        return view('admin.blog.update',compact('data'));
    }
    function pupdate(Request $request, $id){
        $data= array();
        $data['title']= $request->title;
        $data['sologan']= $request->sologan;
        $data['description']= $request->description;
        $image= $request->file('image');
        if($image){
            $name_image = $image->getClientOriginalName();
            $new_image= $name_image.rand(0,99).'.'.$image->getClientOriginalExtension();
            $image->move('upload',$new_image);
            $data['image']= $new_image;
            Blogs::find($id)->update($data);
            return redirect(route('adminblog.index'));
        } 
        Blogs::find($id)->update($data);
        return redirect(route('adminblog.index')); 
    }
}