<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileUserController extends Controller
{
    public function index()
    {
        return view('UserHome.profile.index');
    }
}
