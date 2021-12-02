<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class UserHomeController extends Controller
{
    private $slider;
    public function __construct(Slider $slider)
    {
          $this->slider=$slider;
    }
    public function index()
    {
         $slider=$this->slider->all();
        return view('UserHome.pages.home',compact('slider'));
    }
}
