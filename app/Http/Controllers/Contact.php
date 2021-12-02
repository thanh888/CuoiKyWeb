<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use Illuminate\Http\Request;

class Contact extends Controller
{
    function index(){
        return view('UserHome.pages.contact');
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