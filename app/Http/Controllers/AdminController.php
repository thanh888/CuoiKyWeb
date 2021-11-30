<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }
    public function loginAdmin()
    {
        if (auth()->check()) {
            return redirect()->route('admin.home');
        }
        return view('admin.login');
    }
    public function resgisterAdmin()
    {

        return view('admin.register');
    }

    public function logoutAdmin()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function postLoginAdmin(Request $request)
    {
        $remember = $request->has('remember_me') ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->route('admin.home');
        }
        return redirect()->route('admin.login');
    }
    public function postregister(Request $request)
    {
        if ($request->password1 === $request->password2) {
            try {
                DB::beginTransaction();

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password1),
                ]);


                DB::commit();
                return redirect()->route('admin.login');
            } catch (\Exception $exception) {
                DB::rollBack();
                Log::error('Message' . $exception->getMessage() . 'Line:' . $exception->getLine());
            }
        } else {
            return redirect()->route('admin.register');
        }
    }
}