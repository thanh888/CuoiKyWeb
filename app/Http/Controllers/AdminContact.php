<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use Illuminate\Http\Request;

class AdminContact extends Controller
{
    function index(){
        $data= Contacts::all();
        return view('admin.contact.index',compact('data'));
    }
    function view($id){
        $data= Contacts::find($id);
        return view('admin.contact.view',compact('data'));
    }
}