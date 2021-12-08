<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use App\Models\Need;
use Illuminate\Http\Request;

class Contact extends Controller
{
    function index(){
        $datas= Need::all();
        $needs= [];
        foreach ($datas as $data ) {
            if ($datas->contains($data->parent_id)) {
                $needs[]= $data;
            }
        }
        return view('UserHome.pages.contact',compact('needs'));
    }
    function post(Request $request){
        $data = new Contacts();
        $data->name= $request->name;
        $data->email = $request->email;
        $data->message = $request->message;
        $data->save();
        echo '<script> alert("Gửi liên hệ thành công!") </>';
        return redirect(route('contact.index'));;
    }
}